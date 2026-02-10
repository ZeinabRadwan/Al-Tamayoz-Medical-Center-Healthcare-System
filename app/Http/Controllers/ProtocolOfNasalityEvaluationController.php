<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use App\Models\ProtocolOfNasalityEvaluation;
use App\Models\ReportTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProtocolOfNasalityEvaluationController extends Controller
{
    public function create($patient_id, $template_id)
    {
        $patient = Patients::findOrFail($patient_id);
        $template = ReportTemplate::findOrFail($template_id);
        return view('protocol_of_nasality_evaluation.create', compact('patient', 'template'));
    }

    public function store(Request $request)
    {
        try {

            $nasality = ProtocolOfNasalityEvaluation::create($request->all());

            return redirect()
                ->route('protocol_of_nasality_evaluation.show', $nasality->id)
                ->with('success', 'Report created successfully!');
        } catch (\Exception $e) {
            Log::error('Error saving report:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error saving report!');
        }
    }

    public function show($patient_id)
    {
        $report = ProtocolOfNasalityEvaluation::findOrFail($patient_id);
        return view('protocol_of_nasality_evaluation.show', compact('report'));
    }

    public function edit($id)
    {
        $report = ProtocolOfNasalityEvaluation::findOrFail($id);
        return view('protocol_of_nasality_evaluation.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        try {
            $report = ProtocolOfNasalityEvaluation::findOrFail($id);
            $report->update($request->all());
            return redirect()->route('protocol_of_nasality_evaluation.show', $report->id)->with('success', 'Report updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating report:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error updating report!');
        }
    }

    public function destroy($id)
    {
        try {
            $report = ProtocolOfNasalityEvaluation::findOrFail($id);
            $report->delete();
            return redirect()->route('protocol_of_nasality_evaluation.index')->with('success', 'Report deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting report!');
        }
    }
}
