<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

public function index(Request $request)
{
    $departments = Department::all();
    $perPage = $request->get('perPage', 5);  // Ensure this uses the correct casing

    $services = Service::when($request->department, function ($query) use ($request) {
        return $query->where('department_id', $request->department);
    })->paginate($perPage);  // Use $perPage with correct casing
    
    return view('services.index', compact('services', 'departments'));
}
  

    public function create()
    {
        $departments = Department::all();
        return view('services.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'department_id' => 'required|exists:departments,id', 
        ]);

        Service::create($request->all());

        session()->flash('message', 'تم إضافة الخدمة بنجاح');
        return redirect()->route('services.index');
    }

    public function edit(Service $service)
    {
        $departments = Department::all();
        return view('services.edit', compact('service', 'departments'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $service->update($request->all());
        session()->flash('message', 'تم تعديل الخدمة بنجاح');

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        session()->flash('message', 'تم مسح الخدمة بنجاح');

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
    
}
