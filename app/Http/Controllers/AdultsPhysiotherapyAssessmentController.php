<?php

namespace App\Http\Controllers;

use App\Models\adultAssessment;
use App\Models\Patients;
use App\Models\ReportTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdultsPhysiotherapyAssessmentController extends Controller
{
    public function create($patient_id, $template_id)
    {
        $patient = Patients::findOrFail($patient_id);
        $template = ReportTemplate::findOrFail($template_id);

        return view('adults_physiotherapy_assessment.create', compact('patient', 'template'));
    }

    public function store(Request $request)
    {
        try {
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

            $assessmentData = array_merge($request->all(), $assessmentData);
            $assessment = adultAssessment::create($assessmentData);
            // $assessment->save();
            return redirect()
                ->route('adults_physiotherapy_assessment.show', $assessment->id);
        } catch (\Exception $e) {
            Log::error('Error saving report:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error saving report!');
        }
    }


    public function show($patient_id)
    {
        $report = adultAssessment::findOrFail($patient_id);
        return view('adults_physiotherapy_assessment.show', compact('report'));
    }

    public function edit($id)
    {
        $report = adultAssessment::findOrFail($id);
        return view('adults_physiotherapy_assessment.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        try {
            $report = adultAssessment::findOrFail($id);

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

            $report = adultAssessment::findOrFail($id);

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

            return redirect()->route('adults_physiotherapy_assessment.show', $report->id)->with('success', 'Report updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating report:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error updating report!');
        }
    }
    public function destroy($id)
    {
        $report = adultAssessment::findOrFail($id);
        $report->delete();

        return redirect()->back()->with('success', 'Report deleted successfully!');
    }
}
