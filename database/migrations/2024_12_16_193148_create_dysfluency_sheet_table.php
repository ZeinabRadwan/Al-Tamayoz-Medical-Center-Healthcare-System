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
        Schema::create('dysfluency_sheet', function (Blueprint $table) {
            $table->id();

            // patient_id
            $table->foreignId('patient_id')->constrained('patients');


            // Personal Data
            $table->string('name')->nullable();
            $table->integer('age')->nullable();
            $table->string('sex', 10)->nullable();
            $table->string('residence')->nullable();
            $table->string('tel')->nullable();
            $table->string('parent_age')->nullable();
            $table->string('job')->nullable();
            $table->string('socioeconomic_status')->nullable();
            $table->string('home_occupancy')->nullable();
            $table->string('handedness')->nullable();
            $table->string('bilingualism')->nullable();
            $table->string('education')->nullable();
            $table->string('occupation')->nullable();
            $table->string('motor_skill')->nullable();
            $table->string('hearing_subjectively')->nullable();
            $table->string('similar_conditions_in_family')->nullable();

            // Complaint & Analysis of Symptoms
            $table->string('duration')->nullable(); // i17
            $table->boolean('onset_gradual')->default(false);
            $table->boolean('onset_sudden')->default(false);
            $table->boolean('course_stationary')->default(false);
            $table->boolean('course_increasing')->default(false);
            $table->boolean('course_intermittent')->default(false);

            // Impact of Complaint on the Patient
            $table->string('patients_severity_rating')->nullable();
            $table->string('listeners_reaction')->nullable();
            $table->text('effect_on_personal_social_behavior')->nullable();

            // Illness of Early Childhood
            $table->string('fits')->nullable();
            $table->string('drugs')->nullable();
            $table->string('history_of_dld')->nullable();
            $table->string('earlier_intervention')->nullable();

            // Present Illness
            $table->string('probable_cause')->nullable();
            $table->string('problem_worse_when')->nullable();
            $table->string('problem_better_when')->nullable();
            $table->string('difficult_phonemes_words')->nullable();
            $table->string('reaction_to_difficult_word')->nullable();
            $table->string('speech_situations_avoidance')->nullable();
            $table->string('reading_alone_effect')->nullable();
            $table->string('anticipation_of_problem_effect')->nullable();

            // Auditory Perceptual Assessment: Core Behavior
            $table->boolean('intraphonemic_disruption_part_sound')->default(false);
            $table->boolean('intraphonemic_disruption_part_syllable')->default(false);

            $table->string('adequate_phonation')->nullable();

            $table->boolean('secondary_prolongation')->default(false);
            $table->boolean('secondary_blockage')->default(false);

            $table->boolean('stuttering_avoidance')->default(false);
            $table->boolean('stuttering_mutism')->default(false);
            $table->boolean('stuttering_substitution')->default(false);
            $table->boolean('stuttering_talking')->default(false);

            // ponement pausing
            $table->string('ponement_pausing')->nullable();
            $table->string('repeating_proceeded_words')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dysfluency_sheet');
    }
};
