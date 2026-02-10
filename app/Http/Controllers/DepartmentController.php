<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $departments = Department::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->paginate(10);

        return view('departments.index', compact('departments', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $department = Department::create([
            'name' => $request->name,
        ]);

        return redirect()->route('departments.index')->with('success', 'تم إنشاء القسم بنجاح!');
    }

    public function create()
    {
        return view('departments.create');
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $department = Department::findOrFail($id);
        $department->name = $request->name;
        $department->save();

        return redirect()->route('departments.index')->with('success', 'تم تحديث القسم بنجاح!');
    }

    public function destroy($id)
    {
        $department = Department::find($id);

        if ($department) {
            $department->delete();
            return redirect()->route('departments.index')->with('success', 'تم حذف القسم بنجاح!');
        }

        return redirect()->route('departments.index')->with('error', 'القسم غير موجود.');
    }
}
