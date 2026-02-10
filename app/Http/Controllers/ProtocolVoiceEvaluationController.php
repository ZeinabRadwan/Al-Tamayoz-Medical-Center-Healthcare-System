<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use App\Models\ReportTemplate;
use App\Models\VoiceEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProtocolVoiceEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($patient_id, $template_id)
    {
        $patient = Patients::findOrFail($patient_id);
        $template = ReportTemplate::findOrFail($template_id);
        return view('protocol_for_voice_evaluation.create', compact('patient', 'template'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $voice = VoiceEvaluation::create($data);
            return redirect()
                ->route('protocol_for_voice_evaluation.show', $voice->id)
                ->with('success', 'تم إضافة التقرير بنجاح');
        } catch (\Exception $e) {
            Log::error('Error saving report:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'حدث خطأ أثناء إضافة التقرير');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($patient_id)
    {
        $report = VoiceEvaluation::findOrFail($patient_id);
        return view('protocol_for_voice_evaluation.show', compact('report'));
    }

    public function edit($id)
    {
        $report = VoiceEvaluation::findOrFail($id);
        return view('protocol_for_voice_evaluation.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        try {
            $report = VoiceEvaluation::findOrFail($id);
            $report->update($request->all());
            return redirect()->route('protocol_for_voice_evaluation.show', $report->id)->with('success', 'Report updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating report:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error updating report!');
        }
    }
    public function destroy($id)
    {
        try {
            $report = VoiceEvaluation::findOrFail($id);
            $report->delete();
            return redirect()->back()->with('success', 'Report deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting report:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error deleting report!');
        }
    }
}
