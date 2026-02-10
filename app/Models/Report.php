<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'patient_id',
        'name',
        'age',
        'symptoms',
        'blood_type',
        'medical_report',
        'medical_leave',
        'blood_pressure',
        'height',
        'weight',
        'spo2',
        'rr',
        'hr',
        'bp',
        'pube',
        'temp',
        'diagnosis',
        'medication',
        'treatment_plan',
        'insurance_id',
        'has_insurance',
    ];

    public function patient()
    {
        return  $this->belongsTo(Patients::class, 'patient_id');
    }

    public function details()
    {
        return  $this->hasOne(ReportDetail::class);
    }

    public function template()
    {
        return  $this->belongsTo(ReportTemplate::class, 'report_template_id');
    }
    
public function reportTemplates()
{
    return $this->hasMany(ReportTemplate::class);
}

}
