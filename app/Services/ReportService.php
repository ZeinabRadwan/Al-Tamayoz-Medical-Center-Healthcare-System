<?php

namespace App\Services;

use App\Models\Report;
use App\Models\ReportTemplate;
use Illuminate\Support\Facades\Auth;

class ReportService
{
    public function createReport(int $patientId, ReportTemplate $template, array $formData): Report
    {
        return Report::create([
            'patient_id' => $patientId,
            'report_template_id' => $template->id,
            'title' => $template->formatted_title,
            'type' => $template->type ?? strtolower(str_replace(' ', '_', $template->name)),
            'status' => 'draft',
            'created_by' => Auth::id(),
            'form_data' => $formData
        ]);
    }
}
