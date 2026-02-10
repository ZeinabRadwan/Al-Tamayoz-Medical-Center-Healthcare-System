<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\ReportTemplate;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function createReportTemplates($departmentId, $templates)
    {
        foreach ($templates as $template) {
            ReportTemplate::firstOrCreate(
                [
                    'department_id' => $departmentId,
                    'name' => $template['name'],
                    'slug' => $template['slug'],
                ]
            );
        }
    }

    public function run()
    {
        // العلاج الطبيعي
        $physicalTherapy = Department::firstOrCreate([
            'name' => 'العلاج الطبيعي',
        ]);

        $this->createReportTemplates($physicalTherapy->id, [
            ['name' => 'Adults Physiotherapy Assessment', 'slug' => 'adults_physiotherapy_assessment'],
            ['name' => 'Neurological physiotherapy', 'slug' => 'physiotherapy_assessment'],
        ]);

        // العلاج الوظيفي
        $occupationalTherapy = Department::firstOrCreate([
            'name' => 'العلاج الوظيفي',
        ]);

        $this->createReportTemplates($occupationalTherapy->id, [
            ['name' => 'occupational therapy report', 'slug' => 'occupational_therapy_report'],
            ['name' => 'Everyday living tasks', 'slug' => 'everyday_living_tasks'],
            ['name' => 'Treatment plan of care', 'slug' => 'treatment_plan_of_care'],

        ]);

        // النطق والتخاطب
        $speechTherapy = Department::firstOrCreate([
            'name' => 'علاج علل النطق والتخاطب',
        ]);

        $this->createReportTemplates($speechTherapy->id, [
            ['name' => 'Protocol of nasality evaluation', 'slug' => 'protocol_of_nasality_evaluation'],
            ['name' => 'DYSPHAGIA ASSESSMENT', 'slug' => 'dysphagia_assessment'],
            ['name' => 'Case Number', 'slug' => 'case_number'],
            ['name' => 'Dysfluency Sheet', 'slug' => 'dysfluency_sheet'],
            ['name' => 'FEES SCORE', 'slug' => 'fee_score_reports'],
            ['name' => 'Checklist for Dysarthria evaluation', 'slug' => 'checklist_for_dysarthria_evaluation'],
            ['name' => 'PROTOCOL FOR VOICE EVALUATION', 'slug' => 'protocol_for_voice_evaluation'],
            ['name' => 'DLD Sheet', 'slug' => 'dld_sheet_reports'],
        ]);

        // تحليل السلوك التطبيقي ABA
        $abaTherapy = Department::firstOrCreate([
            'name' => 'تحليل السلوك التطبيقي ABA',
        ]);
    }
}
