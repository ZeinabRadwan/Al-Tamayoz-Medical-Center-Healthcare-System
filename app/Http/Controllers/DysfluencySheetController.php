<?php

namespace App\Http\Controllers;

use App\Models\DysfluencySheet;
use App\Models\Patients;
use App\Models\ReportTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DysfluencySheetController extends Controller
{
    public function create($patient_id, $template_id)
    {
        $patient = Patients::findOrFail($patient_id);
        $template = ReportTemplate::findOrFail($template_id);
        return view('dysfluencyysfluency_sheet.create', compact('patient', 'template'));
    }

    public function store(Request $request)
    {
        try {
            Log::info('Received request data:', $request->all());

            $dyd = DysfluencySheet::create($request->all());

            return redirect()->route('dysfluency_sheet.show', $dyd->id)->with('success', 'Dysfluency Sheet saved successfully!');
        } catch (\Exception $e) {
            Log::error('Error saving report:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error saving DLD report!');
        }
    }

    public function show($patient_id)
    {
        $report = DysfluencySheet::findOrFail($patient_id);
        return view('dysfluency_sheet.show', compact('report'));
    }

    public function edit($id)
    {
        $report = DysfluencySheet::findOrFail($id);
        return view('dysfluency_sheet.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        $report = DysfluencySheet::findOrFail($id);
        $report->update($request->all());
        return redirect()->route('dysfluency_sheet.show', $report->id)->with('success', 'Report updated successfully!');
    }

    public function destroy($id)
    {
        $report = DysfluencySheet::findOrFail($id);
        $report->delete();
        return redirect()->back()->with('success', 'Report deleted successfully!');
    }
}
