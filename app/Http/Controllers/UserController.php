<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
public function index()
{
    $search = request('search'); // Get the search term from the request

    // Start the query on the User model
    $users = User::query();

    // If there's a search term, apply filtering by name
    if ($search) {
        $users->where('name', 'like', '%' . $search . '%');
    }

    // Paginate the results based on the 'perPage' query parameter
    $users = $users->paginate(request('perPage', 5));

    // Get the total user count for the view
    $userCount = $users->total();

    // Get all roles for the view
    $roles = Role::all();

    if (request()->ajax()) {
        // Return only the table content when it's an AJAX request
        return view('users.partials.table', compact('users', 'roles', 'userCount'));
    }

    // Return the entire view on the initial load (including top-controls)
    return view('users.index', compact('users', 'roles', 'userCount'));
}


    public function create()
    {
        $roles = Role::all();
        $departments = Department::all();
        $clinics = Clinic::all();
        return view('users.create', compact('roles', 'departments', 'clinics'));
    }

    public function store(Request  $request)
    {
        $validated =  $request->validate([
            'name' => 'required|string|max:255',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'id_number' => 'nullable|unique:users',
            'dob' => 'nullable|date',
            'address' => 'nullable|string',
            'qualification' => 'nullable|string',
            'major' => 'nullable|string',
            'job_title' => 'nullable|string',
            'start_date' => 'nullable|date',
            'phone' => 'nullable|string',
            'salary_rate' => 'nullable|numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'department_id' => 'nullable|exists:departments,id',
            'clinic_id' => 'nullable|exists:clinics,id',
            'role' => 'required|exists:roles,id',
        ]);

        $validated['password'] = bcrypt($request->password);

        $dob =  $request->dob;
        $age = \Carbon\Carbon::parse($dob)->age;
        $validated['age'] =  $age;

        $user = User::create($validated);
        $role = Role::find($validated['role']);
        $user->assignRole($role);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $roles = Role::all();
        $departments = Department::all();
        $clinics = Clinic::all();

        return view('users.edit', compact('user', 'roles', 'departments', 'clinics'));
    }

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'first_name' => 'nullable|string|max:255',
        'last_name' => 'nullable|string|max:255',
        'id_number' => 'nullable|unique:users,id_number,' . $id,
        'dob' => 'nullable|date',
        'address' => 'nullable|string',
        'qualification' => 'nullable|string',
        'job_title' => 'nullable|string',
        'start_date' => 'nullable|date',
        'phone' => 'nullable|string',
        'salary_rate' => 'nullable|numeric',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|min:8', // Allow optional password
        'department_id' => 'nullable|exists:departments,id',
        'clinic_id' => 'nullable|exists:clinics,id',
        'image' => 'nullable|image|max:2048',
    ]);

    $dob = $request->dob;
    $validated['age'] = $dob ? \Carbon\Carbon::parse($dob)->age : $user->age;

    // Check if a new password is provided
    if ($request->filled('password')) {
        $validated['password'] = bcrypt($request->password);
    } else {
        unset($validated['password']);
    }

    if ($request->hasFile('image')) {
        if ($user->image && Storage::exists('public/' . $user->image)) {
            Storage::delete('public/' . $user->image);
        }
        $validated['image'] = $request->file('image')->store('profile_images', 'public');
    }

    $user->fill($validated);
    $user->save();

    return redirect()->route('users.index')->with('success', 'User updated successfully.');
}


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function updateRole(Request  $request,  $id)
    {
        $user = User::findOrFail($id);

        if (!Auth::user()->hasRole('ادمن')) {
            return redirect()->route('users.index')->with('error', 'Unauthorized');
        }

        $newRole =  $request->input('role');

        $role = Role::findByName($newRole);
        $user->syncRoles([$role->name]);

        if ($role->permissions) {
            $user->syncPermissions($role->permissions->pluck('name')->toArray());
        }

        if ($user->hasRole('مفصول')) {
            $user->update(
                [
                    'is_active' => false,
                ]
            );
        } else {
            $user->update(['is_active' => true]);
        }

        return redirect()->route('users.index')->with('success', 'Role updated successfully');
    }
}
