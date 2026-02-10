<?php

namespace App\Http\Controllers;

use App\Models\FollowUpReport;
use App\Models\Patients;  // Updated to match the model name "Patients.php"
use Illuminate\Http\Request;

class FollowUpReportController extends Controller
{
    public function index(Patients $patient)
    {
        $followUpReports = FollowUpReport::where('patient_id', $patient->id)->get();
        return view('follow-up.index', compact('followUpReports', 'patient'));
    }

    public function create(Patients $patient)
    {
        return view('follow-up.create', compact('patient'));
    }

     public function store(Request $request, Patients $patient)
    {
        // Validate the form input
        $request->validate([
            'report_title' => 'required|string|max:255',
            'current_day' => 'required|date',
            'current_date' => 'required|date',
            'session_proceedings' => 'required|string',
        ]);

        // Ensure that the patient id is correctly passed and used
        if ($patient) {
            FollowUpReport::create([
                'patient_id' => $patient->id,  // Use the patient's id here
                'report_title' => $request->input('report_title', 'Session 1'),
                'current_day' => now(),  // Use current date and time
                'current_date' => today(),
                'session_proceedings' => $request->input('session_proceedings', 'Session details...'),
            ]);
        } else {
            return redirect()->route('patients.index')->with('error', 'Patient not found.');
        }

        // Redirect back to the patient page after successfully adding the follow-up report
        return redirect()->route('patients.show', $patient)->with('success', 'Follow-Up Report added successfully.');
    }

public function show(FollowUpReport $report)
{
    // Fetch the patient by the patient_id from the report
    $patient = Patients::find($report->patient_id);

    if (!$patient) {
        return redirect()->route('patients.index')->with('error', 'Patient not found.');
    }

    // Pass both the report and the patient to the view
    return view('follow-up.show', compact('patient', 'report'));
}



    public function edit(Patients $patient, FollowUpReport $report)
    {
        return view('follow-up.edit', compact('patient', 'report'));
    }

    public function update(Request $request, Patients $patient, FollowUpReport $report)
    {
        $request->validate([
            'report_title' => 'required|string|max:255',
            'current_day' => now(),
            'current_date' => 'required|date',
            'session_proceedings' => 'required|string',
        ]);

        $report->update($request->all());

        return redirect()->route('patients.show', $patient)->with('success', 'Report updated successfully.');
    }

    public function destroy(Patients $patient, FollowUpReport $report)
    {
        $report->delete();

        return redirect()->route('patients.show', $patient)->with('success', 'Report deleted successfully.');
    }
}
