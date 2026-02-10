<?php

namespace App\Http\Controllers;

use App\Models\DysarthriaEvaluation;
use App\Models\Patients;
use App\Models\ReportTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChecklistForDysarthriaEvaluationController extends Controller
{
    public function index()
    {
        //
    }

    public function create($patient_id, $template_id)
    {
        $patient = Patients::findOrFail($patient_id);
        Log::info('Patient ID: ' . $patient_id);
        $template = ReportTemplate::findOrFail($template_id);

        return view('checklist_for_dysarthria_evaluation.create', compact('patient', 'template'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $DysarthriaEvaluation = DysarthriaEvaluation::create($data);
            return redirect()
                ->route('checklist_for_dysarthria_evaluation.show', $DysarthriaEvaluation->id)
                ->with('success', 'تم إضافة التقرير بنجاح');;
        } catch (\Exception $e) {
            Log::error('Error saving report:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'حدث خطأ أثناء إضافة التقرير');
        }
    }

    public function show($id)
    {
        $report = DysarthriaEvaluation::findOrFail($id);
        return view('checklist_for_dysarthria_evaluation.show', compact('report'));
    }

    public function edit($id)
    {
        $report = DysarthriaEvaluation::findOrFail($id);
        return view('checklist_for_dysarthria_evaluation.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        try {
            $report = DysarthriaEvaluation::findOrFail($id);
            $report->update($request->all());
            return redirect()->route('checklist_for_dysarthria_evaluation.show', $report->id)->with('success', 'تم تحديث التقرير بنجاح');
        } catch (\Exception $e) {
            Log::error('Error updating report:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'حدث خطأ أثناء تحديث التقرير');
        }
    }

    public function destroy($id)
    {
        try {
            $report = DysarthriaEvaluation::findOrFail($id);
            $report->delete();
            return redirect()->route('checklist_for_dysarthria_evaluation.index')->with('success', 'تم حذف التقرير بنجاح');
        } catch (\Exception $e) {
            Log::error('Error deleting report:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'حدث خطأ أثناء حذف التقرير');
        }
    }
}
