<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TreatmentPlan extends Model
{
    protected $table = 'treatment_plan_of_care';
    protected $fillable = [
                'patient_id',

        'problems_list',
        'short_term_goals',
        'long_term_goals',
        'problems_list_6',
        'short_term_goals_6',
        'long_term_goals_6',
        'problems_list_12',
        'short_term_goals_12',
        'long_term_goals_12',
    ];
    protected $casts = [
        'problems_list' => 'array',
        'short_term_goals' => 'array',
        'long_term_goals' => 'array',
        'problems_list_6' => 'array',
        'short_term_goals_6' => 'array',
        'long_term_goals_6' => 'array',
        'problems_list_12' => 'array',
        'short_term_goals_12' => 'array',
        'long_term_goals_12' => 'array',
    ];
}
