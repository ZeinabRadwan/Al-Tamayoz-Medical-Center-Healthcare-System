<?php

namespace App\Http\Controllers;

use App\Models\DysphagiaAssessment;
use App\Models\Patients;
use App\Models\ReportTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DysphagiaAssessmentController extends Controller
{
    public function create($patient_id, $template_id)
    {
        $patient = Patients::findOrFail($patient_id);
        $template = ReportTemplate::findOrFail($template_id);
        return view('dysphagia_assessment.create', compact('patient', 'template'));
    }

    public function store(Request $request)
    {
        try {

            $asses = DysphagiaAssessment::create($request->all());

            return redirect()
                ->route('dysphagia_assessment.show', $asses->id)
                ->with('success', 'تم إضافة التقرير بنجاح');;
        } catch (\Exception $e) {
            Log::error('Error saving report:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error saving DLD report!');
        }
    }

    public function show($patient_id)
    {
        $report = DysphagiaAssessment::findOrFail($patient_id);
        return view('dysphagia_assessment.show', compact('report'));
    }

    public function edit($id)
    {
        $report = DysphagiaAssessment::findOrFail($id);
        return view('dysphagia_assessment.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        try {
            Log::info('Received request data:', $request->all());

            $report = DysphagiaAssessment::findOrFail($id);
            $report->update($request->all());
            return redirect()->route('dysphagia_assessment.show', $report->id)->with('success', 'Report updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating report:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error updating report!');
        }
    }

    public function destroy($id)
    {
        try {
            $report = DysphagiaAssessment::findOrFail($id);
            $report->delete();
            return redirect()->back()->with('success', 'Report deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting report:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error deleting report!');
        }
    }
}
