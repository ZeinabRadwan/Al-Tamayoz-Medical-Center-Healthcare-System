<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseNumber extends Model
{
    protected $table = 'case_number';
    protected $fillable = [
        'patient_id',
        'name',
        'age',
        'sex',
        'pregnancy',
        'consanguinity',
        'siblings_conditions',
        'main_dx',
        'term',
        'nicu',
        'cyanosis',
        'jaundice',
        'feeding_at_birth',
        'solid_feeds_start',
        'tube_dependent_1',
        'tube_dependent_2',
        'tube_dependent_3',
        'oral_feeding_4',
        'oral_feeding_5',
        'oral_feeding_6',
        'oral_feeding_7',
        'textures_eaten',
        'last_day_feeds',
        'mch_score',
        'eat10_score',
        'respiratory_symptom',
        'masses_positive',
        'masses_negative',
        'engorged_veins_positive',
        'engorged_veins_negative',
        'duration',
        'cause',
        'nose',
        'nasopharynx',
        'oral_cavity',
        'larynx',
        'endoscopy',
        'radiology'
    ];
}
