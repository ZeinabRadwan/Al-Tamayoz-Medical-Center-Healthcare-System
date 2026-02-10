<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DldReport;
use App\Models\Patients;
use App\Models\ReportTemplate;
use Illuminate\Support\Facades\Log;

class DldSheetReportController extends Controller
{
    public function create($patient_id, $template_id)
    {
        $patient = Patients::findOrFail($patient_id);
        $template = ReportTemplate::findOrFail($template_id);
        return view('dld_sheet_reports.create', compact('patient', 'template'));
    }

    public function store(Request $request)
    {
        try {

            $dld = DldReport::create($request->all());

            return redirect()
                ->route('dld_sheet_reports.show', $dld->id)
                ->with('success', 'DLD report created successfully');
                
        } catch (\Exception $e) {
            Log::error('Error saving report:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error saving DLD report!');
        }
    }

    public function show($patient_id)
    {
        $report = DldReport::findOrFail($patient_id);
        return view('dld_sheet_reports.show', compact('report'));
    }

    public function edit($id)
    {
        $report = DldReport::findOrFail($id);
        return view('dld_sheet_reports.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        $report = DldReport::findOrFail($id);
        $report->update($request->all());
        return redirect()->route('dld_sheet_reports.show', $report->id)->with('success', 'DLD report updated successfully');
    }

    public function destroy($id)
    {
        $report = DldReport::findOrFail($id);
        $report->delete();
        return redirect()->route('dld_sheet_reports.index')->with('success', 'DLD report deleted successfully');
    }
}
