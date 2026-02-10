<?php

namespace App\Http\Controllers;

use App\Models\InsuranceProvider;
use App\Models\Patients;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{
    public function create($patient_id)
    {
        $patient = Patients::findOrFail($patient_id);
        $insuranceProviders = InsuranceProvider::all();

        return view('reports.create', compact('patient', 'insuranceProviders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'name' => 'required|string',
            'age' => 'nullable|integer',
            'symptoms' => 'nullable|string',
            'blood_type' => 'nullable|string',
            'medical_report' => 'required|string|max:65535',
            'medical_leave' => 'nullable|string',
            'bp' => 'nullable|numeric',
            'temp' => 'nullable|numeric',
            'pube' => 'nullable|numeric',
            'hr' => 'nullable|numeric',
            'rr' => 'nullable|numeric',
            'spo2' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'diagnosis' => 'nullable|string',
            'medication' => 'nullable|string',
            'treatment_plan' => 'nullable|string',
            'insurance_id' => 'nullable|exists:insurance_providers,id|required_if:has_insurance,yes',
            'has_insurance' => 'nullable|string',
        ]);

        $repo = Report::create($validated);
        $validated['has_insurance'] = $request->has_insurance === 'yes' ? 'yes' : 'no';

        return redirect()
            ->route('reports.show', $repo->id)
            ->with('success', 'Report created successfully!');
    }

    public function edit(Report $id)
    {
        $report = $id;
        $patient = Patients::findOrFail($report->patient_id);
        $insuranceProviders = InsuranceProvider::all();
        return view('reports.edit', compact('report', 'patient', 'insuranceProviders'));
    }

    public function update(Request $request, Report $report)
    {
        try {

            $validated = $request->validate([
                'patient_id' => 'required|exists:patients,id',
                'name' => 'required|string',
                'age' => 'nullable|integer',
                'symptoms' => 'nullable|string',
                'blood_type' => 'nullable|string',
                'medical_report' => 'required|string|max:65535',
                'medical_leave' => 'nullable|string',
                'bp' => 'nullable|numeric',
                'temp' => 'nullable|numeric',
                'pube' => 'nullable|numeric',
                'hr' => 'nullable|numeric',
                'rr' => 'nullable|numeric',
                'spo2' => 'nullable|numeric',
                'weight' => 'nullable|numeric',
                'height' => 'nullable|numeric',
                'diagnosis' => 'nullable|string',
                'medication' => 'nullable|string',
                'treatment_plan' => 'nullable|string',
                'insurance_id' => 'nullable|exists:insurance_providers,id|required_if:has_insurance,yes',
                'has_insurance' => 'nullable|string',
            ]);

            $report->update($validated);
            return redirect()->back()->with('success', 'Report updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating report: ' . $e->getMessage());
        }
    }

public function destroy(Report $report)
{
    try {
        // Delete related records first
        $report->reportTemplates()->delete();

        // Now delete the report
        $report->delete();

        return redirect()->back()->with('success', 'Report deleted successfully!');
    } catch (\Exception $e) {
        \Log::error('Error deleting report: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to delete the report. Please try again.');
    }
}


    public function show(Report $patient_id)
    {
        $report = $patient_id;
        $patient = Patients::findOrFail($report->patient_id);
        $insuranceProviders = InsuranceProvider::all();
        return view('reports.show', compact('report', 'patient', 'insuranceProviders'));
    }
}
