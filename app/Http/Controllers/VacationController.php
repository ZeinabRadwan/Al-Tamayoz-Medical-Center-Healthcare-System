<?php

namespace App\Http\Controllers;

use App\Models\Vacation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacationController extends Controller
{
    public function index()
    {
         $vacations = Vacation::where('employee_id', Auth::id())->get();
        return view('vacations.index', compact('vacations'));
    }

    public function create()
    {
        return view('vacations.create');
    }

    public function store(Request  $request)
    {
         $request->validate([
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Vacation::create([
            'employee_id' => Auth::id(),
            'start_date' =>  $request->start_date,
            'end_date' =>  $request->end_date,
        ]);

        return redirect()->route('vacations.index')->with('success', 'Vacation request submitted successfully.');
    }

    public function adminIndex()
    {
         $vacations = Vacation::with('employee')->get();
        return view('vacations.admin', compact('vacations'));
    }

    public function updateStatus(Request  $request, Vacation  $vacation)
    {
         $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

         $vacation->update(['status' =>  $request->status]);

        return redirect()->route('vacations.admin')->with('success', 'Vacation request updated successfully.');
    }
}
