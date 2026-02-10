<?php

namespace App\Http\Controllers;

use App\Models\OccupationalTherapy;
use App\Models\Patients;
use App\Models\ReportTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OccupationalTherapyController extends Controller
{
    public function create($patient_id, $template_id)
    {
        $patient = Patients::findOrFail($patient_id);
        $template = ReportTemplate::findOrFail($template_id);
        return view('occupational_therapy_report.create', compact('patient', 'template'));
    }

    public function store(Request $request)
    {
        try {

            $therapy = OccupationalTherapy::create($request->all());

            return redirect()
                ->route('occupational_therapy_report.show', $therapy->id)
                ->with('success', 'Occupational Therapy report created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error saving  report!');
        }
    }

    public function show($patient_id)
    {
        $report = OccupationalTherapy::findOrFail($patient_id);
        return view('occupational_therapy_report.show', compact('report'));
    }

    public function edit($id)
    {
        $report = OccupationalTherapy::findOrFail($id);
        return view('occupational_therapy_report.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        try {
            $report = OccupationalTherapy::findOrFail($id);
            $report->update($request->all());
            return redirect()->route('occupational_therapy_report.show', $report->id)->with('success', 'Report updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating report:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error updating report!');
        }
    }

    public function destroy($id)
    {
        try {
            $report = OccupationalTherapy::findOrFail($id);
            $report->delete();
            return redirect()->back()->with('success', 'Report deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting report:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error deleting report!');
        }
    }
}
