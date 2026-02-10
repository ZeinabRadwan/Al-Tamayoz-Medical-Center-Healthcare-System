<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportDetail extends Model
{
    protected  $fillable = [
        'report_id',
        'patient_name',
        'age',
        'gender',
        'date',
        'therapist_name',
        'diagnosis',
        'medical_history',
        'medication',
        'precautions',
        'social_history',
        'gross_motor_skills',
        'fine_motor_skills',
        'rom_data'
    ];

    protected  $casts = [
        'rom_data' => 'json'
    ];

    public function report()
    {
        return  $this->belongsTo(Report::class);
    }
}
