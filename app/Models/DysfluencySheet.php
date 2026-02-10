<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DysfluencySheet extends Model
{
    protected $table = 'dysfluency_sheet';


    protected $fillable = [
        'patient_id',
        // Personal Data
        'name',
        'age',
        'sex',
        'residence',
        'tel',
        'parent_age',
        'job',
        'socioeconomic_status',
        'home_occupancy',
        'handedness',
        'bilingualism',
        'education',
        'occupation',
        'motor_skill',
        'hearing_subjectively',
        'similar_conditions_in_family',

        // Complaint & Analysis of Symptoms
        'duration',
        'onset_gradual',
        'onset_sudden',
        'course_stationary',
        'course_increasing',
        'course_intermittent',

        // Impact of Complaint on the Patient
        'patients_severity_rating',
        'listeners_reaction',
        'effect_on_personal_social_behavior',

        // Illness of Early Childhood
        'fits',
        'drugs',
        'history_of_dld',
        'earlier_intervention',

        // Present Illness
        'probable_cause',
        'problem_worse_when',
        'problem_better_when',
        'difficult_phonemes_words',
        'reaction_to_difficult_word',
        'speech_situations_avoidance',
        'reading_alone_effect',
        'anticipation_of_problem_effect',

        // Auditory Perceptual Assessment: Core Behavior
        'intraphonemic_disruption_part_sound',
        'intraphonemic_disruption_part_syllable',
        'adequate_phonation',
        'secondary_prolongation',
        'secondary_blockage',
        'stuttering_avoidance',
        'stuttering_mutism',
        'stuttering_substitution',
        'stuttering_talking',
        'ponement_pausing',
        'repeating_proceeded_words',
    ];
}
