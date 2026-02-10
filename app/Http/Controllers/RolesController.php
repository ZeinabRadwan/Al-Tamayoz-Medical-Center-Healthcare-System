<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('roles.index', compact('roles', 'permissions'));
    }

    public function create()
    {
        $permissions = Permission::all(); 
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'permissions' => 'array',
        ]);

        $role = Role::create(['name' => $request->name]);

        if ($request->has('permissions')) {
            $permissions = Permission::whereIn('id', $request->permissions)->get();
            if ($permissions->count() !== count($request->permissions)) {
                return redirect()->back()->withErrors(['permissions' => 'إحدى الصلاحيات أو أكثر التي اخترتها غير موجودة.']);
            }

            $role->givePermissionTo($permissions);
        }

        return redirect()->route('roles.index')->with('success', 'تم إنشاء الصلاحية بنجاح!');
    }

    public function show(string $id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all(); 
        return view('roles.show', compact('role', 'permissions'));
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all(); 
        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'array', 
        ]);

        $role = Role::findOrFail($id);
        $role->update(['name' => $request->name]);

        if ($request->has('permissions')) {
            $permissions = Permission::whereIn('id', $request->permissions)->get();
            if ($permissions->count() !== count($request->permissions)) {
                return redirect()->back()->withErrors(['permissions' => 'إحدى الصلاحيات أو أكثر التي اخترتها غير موجودة.']);
            }

            $role->syncPermissions($permissions);
        }

        return redirect()->route('roles.index')->with('success', 'تم تحديث الصلاحية والصلاحيات بنجاح!');
    }

    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'تم حذف الصلاحية بنجاح!');
    }
}
