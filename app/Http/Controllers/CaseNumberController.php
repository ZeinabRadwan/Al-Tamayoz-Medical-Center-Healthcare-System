<?php

namespace App\Http\Controllers;

use App\Models\CaseNumber;
use App\Models\Patients;
use App\Models\ReportTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CaseNumberController extends Controller
{
    public function create($patient_id, $template_id)
    {
        $patient = Patients::findOrFail($patient_id);
        $template = ReportTemplate::findOrFail($template_id);
        return view('case_number.create', compact('patient', 'template'));
    }

    public function store(Request $request)
    {
        try {
            $caseReport = CaseNumber::create($request->all());
            return redirect()
                ->route('case_number.show', $caseReport->id)
                ->with('success', 'DLD report created successfully!');
        } catch (\Exception $e) {
            Log::error('Error saving report:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error saving DLD report!');
        }
    }

    public function show($patient_id)
    {
        $report = CaseNumber::findOrFail($patient_id);
        return view('case_number.show', compact('report'));
    }

    public function edit($id)
    {
        $report = CaseNumber::findOrFail($id);
        return view('case_number.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        try {
            $report = CaseNumber::findOrFail($id);
            $report->update($request->all());
            return redirect()->route('case_number.show', $report->id)->with('success', 'Report updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating report:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error updating report!');
        }
    }
    public function destroy($id)
    {
        $report = CaseNumber::findOrFail($id);
        $report->delete();
        return redirect()->back()->with('success', 'Report deleted successfully!');
    }
}
