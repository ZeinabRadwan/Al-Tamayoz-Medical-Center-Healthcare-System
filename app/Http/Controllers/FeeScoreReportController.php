<?php

namespace App\Http\Controllers;

use App\Models\FeeScoreReport;
use App\Models\Patients;
use App\Models\ReportTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FeeScoreReportController extends Controller
{
    public function index()
    {
        $reports = FeeScoreReport::all();
        return response()->json($reports);
    }

    public function create($patient_id, $template_id)
    {
        $patient = Patients::findOrFail($patient_id);
        $template = ReportTemplate::findOrFail($template_id);

        return view('fee_score_reports.create', compact('patient', 'template'));
    }
    public function store(Request $request)
    {

        $feeReport = FeeScoreReport::create($request->all());

        return redirect()
            ->route('fee_score_reports.show', $feeReport->id);
    }

    public function show($patient_id)
    {
        $report = FeeScoreReport::findOrFail($patient_id);
        return view('fee_score_reports.show', compact('report'));
    }

    public function edit($id)
    {
        $report = FeeScoreReport::findOrFail($id);
        return view('fee_score_reports.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {


        $report = FeeScoreReport::findOrFail($id);
        $report->update($request->all());

        return redirect()->back()->with('success', 'Report updated successfully!');
    }

    public function destroy($id)
    {
        $report = FeeScoreReport::findOrFail($id);
        $report->delete();

        return redirect()->back()->with('success', 'Report deleted successfully!');
    }
}
