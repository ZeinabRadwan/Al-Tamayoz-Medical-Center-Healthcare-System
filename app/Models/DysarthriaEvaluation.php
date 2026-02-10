<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DysarthriaEvaluation extends Model
{
    protected $fillable = [
        'patient_id',
        // Personal Data
        'name',
        'residence',
        'handedness',
        'marital_status',
        'premorbid_educational_level',
        'age',
        'sex',
        'telephone',
        'occupation',
        'smoking',
        'literal_sophistication',

        // Past History
        'relevant_diseases',
        'diseases_duration',
        'hypertension',
        'hypertension_duration',
        'mild',
        'moderate',
        'severe',
        'fever',
        'trauma',
        'epilepsy',
        'drug_intake',
        'operations',
        'similar_episode',
        'related_episode_tia',

        // Complaint & Analysis of Symptoms
        'onset_gradual',
        'onset_sudden',
        'onset_dramatic',
        'duration',
        'course_stationary',
        'course_progressive',
        'course_regressive',
        'prodromal_headache',
        'prodromal_light_flashes',
        'prodromal_numbness',
        'prodromal_weakness',

        // Level of Consciousness
        'consciousness_semicoma',
        'consciousness_stupor',
        'consciousness_drowsiness',
        'consciousness_conscious',
        'consciousness_coma',

        // Neurological Deficits
        'hemiplegia',
        'involuntary_movements',
        'sensory_disturbances',
        'convulsions',
        'swallowing_difficulties',
        'bladder_disturbances',

        // Motoric Disability
        'upper_limb',
        'lower_limb',
        'right_side',
        'left_side',
        'disability_mild',
        'disability_moderate',
        'disability_severe',

        // Communication Means
        'comm_verbal',
        'comm_gestures',
        'comm_writing',
        'comm_drawing',

        // Vision and Hearing
        'vision_affection',
        'hearing_affection',

        // Previous Investigation
        'investigation_ct',
        'investigation_eeg',

        // Previous Treatment
        'treatment_type',
        'treatment_onset',
        'treatment_duration',
        'treatment_effect',

        // Clinical Examination
        'exam_temperature',
        'exam_pulse',
        'exam_blood_pressure',
        'exam_heart_murmur',

        // ENT Examination
        'ent_oral_cavity',
        'ent_pharynx',
        'ent_nasal_cavity',
        'ent_ears',
        'ent_laryngoscopy',

        // Neurological Examination
        'cranial_nerves',
        'motor_system',
        'sensory_system',

        // Clinical Diagnostic Aids
        'speech_intelligibility',
        'reading_passage',
        'vowel_prolongation',
        'syllable_repetition',
        'reading_rate',
        'max_phonation_time',
        'diadokokinetic_rate',

        // Formal Testing
        'articulation_test',
        'dysphasia_test',
        'cognitive_perceptual_eval',

        // Aerodynamic Measures
        'vital_capacity_normal',
        'vital_capacity_increase',
        'vital_capacity_decrease',
        'nasal_flow_normal',
        'nasal_flow_increase',
        'nasal_flow_decrease',
        'oral_flow_normal',
        'oral_flow_increase',
        'oral_flow_decrease',
        'intraoral_pressure_normal',
        'intraoral_pressure_increase',
        'intraoral_pressure_decrease',

        // Additional Tests and Consultations
        'acoustic_analysis',
        'xray_results',
        'electromyography',
        'brain_ct',
        'eeg_results',
        'pet_scan',
        'mri_results',
        'cerebral_angiography',
        'transcranial_doppler',
        'additional_consultation',
        'audiological_consultation',
        'ophthalmological_consultation',
        'other_consultations',
    ];

    protected $table = 'checklist_for_dysarthria_evaluation';

    public function patient()
    {
        return $this->belongsTo(Patients::class);
    }
}
