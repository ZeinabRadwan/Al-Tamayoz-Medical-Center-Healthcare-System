<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use App\Models\ReportTemplate;
use App\Models\TreatmentPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TreatmentPlanOfCareController extends Controller
{
    public function create($patient_id, $template_id)
    {
        $patient = Patients::findOrFail($patient_id);
        $template = ReportTemplate::findOrFail($template_id);

        return view('treatment_plan_of_care.create', compact('patient', 'template'));
    }

public function store(Request $request)
{
    try {
        // Validate the incoming request
        $data = $request->validate([
            'patient_id' => 'required|exists:patients,id', // Validate that patient_id exists
            'problems' => 'nullable|array',
            'short_term_goals' => 'nullable|array',
            'long_term_goals' => 'nullable|array',
            'problems2' => 'nullable|array',
            'short_term_goals2' => 'nullable|array',
            'long_term_goals2' => 'nullable|array',
            'problems3' => 'nullable|array',
            'short_term_goals3' => 'nullable|array',
            'long_term_goals3' => 'nullable|array',
        ]);

        // Prepare the data for the treatment plan
        $assessmentData = [
            'patient_id' => $data['patient_id'], // Add patient_id to the assessment data
            'problems_list' => $data['problems'] ?? [],
            'short_term_goals' => $data['short_term_goals'] ?? [],
            'long_term_goals' => $data['long_term_goals'] ?? [],
            'problems_list_6' => $data['problems2'] ?? [],
            'short_term_goals_6' => $data['short_term_goals2'] ?? [],
            'long_term_goals_6' => $data['long_term_goals2'] ?? [],
            'problems_list_12' => $data['problems3'] ?? [],
            'short_term_goals_12' => $data['short_term_goals3'] ?? [],
            'long_term_goals_12' => $data['long_term_goals3'] ?? [],
        ];

        // Create the treatment plan record
        $assessment = TreatmentPlan::create($assessmentData);

        // Redirect to the treatment plan's show page
        return redirect()
            ->route('treatment_plan_of_care.show', $assessment->id)
            ->with('success', 'Report created successfully!');
    } catch (\Exception $e) {
        // Log the error and return an error response
        Log::error('Error saving report:', ['message' => $e->getMessage()]);
        return redirect()->back()->with('error', 'Error saving report!');
    }
}



    public function show($patient_id)
    {
        $report = TreatmentPlan::findOrFail($patient_id);
        return view('treatment_plan_of_care.show', compact('report'));
    }

    public function edit($id)
    {
        $report = TreatmentPlan::findOrFail($id);
        return view('treatment_plan_of_care.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        try {
            $report = TreatmentPlan::findOrFail($id);

            $data = $request->validate([
                'problems' => 'nullable|array',
                'short_term_goals' => 'nullable|array',
                'long_term_goals' => 'nullable|array',
                'problems2' => 'nullable|array',
                'short_term_goals2' => 'nullable|array',
                'long_term_goals2' => 'nullable|array',
                'problems3' => 'nullable|array',
                'short_term_goals3' => 'nullable|array',
                'long_term_goals3' => 'nullable|array',
            ]);

            $report = TreatmentPlan::findOrFail($id);

            $assessmentData = [
                'problems_list' => $data['problems'],
                'short_term_goals' => $data['short_term_goals'],
                'long_term_goals' => $data['long_term_goals'],
                'problems_list_6' => $data['problems2'],
                'short_term_goals_6' => $data['short_term_goals2'],
                'long_term_goals_6' => $data['long_term_goals2'],
                'problems_list_12' => $data['problems3'],
                'short_term_goals_12' => $data['short_term_goals3'],
                'long_term_goals_12' => $data['long_term_goals3'],

            ];

            $allData = array_merge($request->all(), $assessmentData);
            $report->update($allData);

            return redirect()->route('treatment_plan_of_care.show', $report->id)->with('success', 'Report updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating report:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error updating report!');
        }
    }
    public function destroy($id)
    {
        $report = TreatmentPlan::findOrFail($id);
        $report->delete();

        return redirect()->back()->with('success', 'Report deleted successfully!');
    }
}
