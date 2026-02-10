<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('checklist_for_dysarthria_evaluation', function (Blueprint $table) {
            $table->id();

            $table->foreignId('patient_id')->constrained()->cascadeOnDelete();

            // Personal Data
            $table->string('name')->nullable();
            $table->string('age')->nullable();
            $table->string('residence')->nullable();
            $table->string('handedness')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('premorbid_educational_level')->nullable();
            $table->string('sex')->nullable();
            $table->string('telephone')->nullable();
            $table->string('occupation')->nullable();
            $table->string('smoking')->nullable();
            $table->string('literal_sophistication')->nullable();

            // Past History
            $table->string('relevant_diseases')->nullable();
            $table->string('diseases_duration')->nullable();
            $table->string('hypertension')->nullable();
            $table->string('hypertension_duration')->nullable();

            $table->boolean('mild')->default(false);
            $table->boolean('moderate')->default(false);
            $table->boolean('severe')->default(false);
            $table->boolean('fever')->default(false);
            $table->boolean('trauma')->default(false);
            $table->boolean('epilepsy')->default(false);
            $table->boolean('drug_intake')->default(false);
            $table->boolean('operations')->default(false);

            $table->string('similar_episode')->nullable();
            $table->string('related_episode_tia')->nullable();

            // Complaint & Analysis of Symptoms
            $table->boolean('onset_gradual')->default(false);
            $table->boolean('onset_sudden')->default(false);
            $table->boolean('onset_dramatic')->default(false);
            $table->string('duration')->nullable();
            $table->boolean('course_stationary')->default(false);
            $table->boolean('course_progressive')->default(false);
            $table->boolean('course_regressive')->default(false);
            $table->boolean('prodromal_headache')->default(false);
            $table->boolean('prodromal_light_flashes')->default(false);
            $table->boolean('prodromal_numbness')->default(false);
            $table->boolean('prodromal_weakness')->default(false);

            // Level of Consciousness
            $table->boolean('consciousness_semicoma')->default(false);
            $table->boolean('consciousness_stupor')->default(false);
            $table->boolean('consciousness_drowsiness')->default(false);
            $table->boolean('consciousness_conscious')->default(false);
            $table->boolean('consciousness_coma')->default(false);

            // Neurological Deficits
            $table->boolean('hemiplegia')->default(false);
            $table->boolean('involuntary_movements')->default(false);
            $table->boolean('sensory_disturbances')->default(false);
            $table->boolean('convulsions')->default(false);
            $table->boolean('swallowing_difficulties')->default(false);
            $table->boolean('bladder_disturbances')->default(false);

            // Motoric Disability
            $table->boolean('upper_limb')->default(false);
            $table->boolean('lower_limb')->default(false);
            $table->boolean('right_side')->default(false);
            $table->boolean('left_side')->default(false);
            $table->boolean('disability_mild')->default(false);
            $table->boolean('disability_moderate')->default(false);
            $table->boolean('disability_severe')->default(false);

            // Communication Means
            $table->boolean('comm_verbal')->default(false);
            $table->boolean('comm_gestures')->default(false);
            $table->boolean('comm_writing')->default(false);
            $table->boolean('comm_drawing')->default(false);

            // Vision and Hearing
            $table->string('vision_affection')->nullable();
            $table->string('hearing_affection')->nullable();

            // Previous Investigation
            $table->boolean('investigation_ct')->default(false);
            $table->boolean('investigation_eeg')->default(false);

            // Previous Treatment
            $table->boolean('treatment_type')->default(false);
            $table->boolean('treatment_onset')->default(false);
            $table->boolean('treatment_duration')->default(false);
            $table->boolean('treatment_effect')->default(false);

            // Clinical Examination
            $table->boolean('exam_temperature')->default(false);
            $table->boolean('exam_pulse')->default(false);
            $table->boolean('exam_blood_pressure')->default(false);
            $table->boolean('exam_heart_murmur')->default(false);

            // ENT Examination
            $table->boolean('ent_oral_cavity')->default(false);
            $table->boolean('ent_pharynx')->default(false);
            $table->boolean('ent_nasal_cavity')->default(false);
            $table->boolean('ent_ears')->default(false);
            $table->boolean('ent_laryngoscopy')->default(false);

            // Neurological Examination
            $table->text('cranial_nerves')->nullable();
            $table->text('motor_system')->nullable();
            $table->text('sensory_system')->nullable();

            // Clinical Diagnostic Aids
            $table->boolean('speech_intelligibility')->default(false);
            $table->boolean('reading_passage')->default(false);
            $table->boolean('vowel_prolongation')->default(false);
            $table->boolean('syllable_repetition')->default(false);
            $table->boolean('reading_rate')->default(false);
            $table->boolean('max_phonation_time')->default(false);
            $table->boolean('diadokokinetic_rate')->default(false);

            // Formal Testing
            $table->text('articulation_test')->nullable();
            $table->text('dysphasia_test')->nullable();
            $table->text('cognitive_perceptual_eval')->nullable();

            // Aerodynamic Measures
            $table->boolean('vital_capacity_normal')->default(false);
            $table->boolean('vital_capacity_increase')->default(false);
            $table->boolean('vital_capacity_decrease')->default(false);
            $table->boolean('nasal_flow_normal')->default(false);
            $table->boolean('nasal_flow_increase')->default(false);
            $table->boolean('nasal_flow_decrease')->default(false);
            $table->boolean('oral_flow_normal')->default(false);
            $table->boolean('oral_flow_increase')->default(false);
            $table->boolean('oral_flow_decrease')->default(false);
            $table->boolean('intraoral_pressure_normal')->default(false);
            $table->boolean('intraoral_pressure_increase')->default(false);
            $table->boolean('intraoral_pressure_decrease')->default(false);

            // Additional Tests and Consultations
            $table->text('acoustic_analysis')->nullable();
            $table->text('xray_results')->nullable();
            $table->text('electromyography')->nullable();
            $table->text('brain_ct')->nullable();
            $table->text('eeg_results')->nullable();
            $table->text('pet_scan')->nullable();
            $table->text('mri_results')->nullable();
            $table->text('cerebral_angiography')->nullable();
            $table->text('transcranial_doppler')->nullable();
            $table->text('additional_consultation')->nullable();
            $table->text('audiological_consultation')->nullable();
            $table->text('ophthalmological_consultation')->nullable();
            $table->text('other_consultations')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checklist_for_dysarthria_evaluation');
    }
};
