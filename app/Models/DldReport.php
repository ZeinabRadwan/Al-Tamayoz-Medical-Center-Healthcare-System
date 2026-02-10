<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DldReport extends Model
{
    use HasFactory;


    protected $fillable = [
        'patient_id',
        'name',
        'age',
        'residence',
        'school_or_kg',
        'socioeconomic_state',
        'consanguinity',
        'age_education_occupation',
        'mother',
        'father',
        'history',
        'child_caretaker',
        'other_languages',
        'parents_attitude',
        'previous_travel',
        'hearing_age',
        'hearing_degree',
        'hearing_aid',
        'hearing_rehabilitation',
        'previous_ear_operations',
        'vision',
        'intelligence',
        'motility',
        'behavior',
        'sleep_complaints',
        'feeding_complaints',
        'growth_development_history',
        'growth_development_feeding',
        'milestones_first_word',
        'milestones_walking',
        'milestones_teething',
        'milestones_self_help',
        'gross_motor',
        'fine_motor',
        'past_illness_history',
        'observation',
        'general_eaxamination',
        'neurological_examination',
        'oral_examination',
        'head_neck_examination',
        'language_evaluation',
        'mode_of_communication',
        'passive_language',
        'active_language',
        'nasality',
        'dysfluency',
        'change_of_voice',
        'rate_of_speech',
        'formal_language_assessment',
        'psychometric_assessment',
        'i1',
        'i2',
        'i3',
        'i4',
        'i5',
        'i6',
        'i7',
        'i8',
        'i9',
        'i10',
        'i11',
        'i12',
        'i13',
        'i14',
        'i15',
        'i16',
        'i17',
        'i18',
    ];

    protected $table = 'dld_sheet_reports';

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id');
    }
}
