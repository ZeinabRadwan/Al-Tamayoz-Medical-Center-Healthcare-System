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
        Schema::create('dld_sheet_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients');
            $table->string('name')->nullable();
            $table->integer('age')->nullable();
            $table->string('residence')->nullable();
            $table->string('school_or_kg')->nullable();
            $table->string('socioeconomic_state')->nullable();
            $table->string('consanguinity')->nullable();
            $table->string('age_education_occupation')->nullable();
            $table->string('mother')->nullable();
            $table->string('father')->nullable();
            $table->string('history')->nullable();
            $table->string('child_caretaker')->nullable();
            $table->string('other_languages')->nullable();
            $table->string('parents_attitude')->nullable();
            $table->string('previous_travel')->nullable();
            $table->string('hearing_age')->nullable();
            $table->string('hearing_degree')->nullable();
            $table->string('hearing_aid')->nullable();
            $table->string('hearing_rehabilitation')->nullable();
            $table->string('previous_ear_operations')->nullable();
            $table->string('vision')->nullable();
            $table->string('intelligence')->nullable();
            $table->string('motility')->nullable();
            $table->string('behavior')->nullable();
            $table->string('sleep_complaints')->nullable();
            $table->string('feeding_complaints')->nullable();
            $table->text('growth_development_history')->nullable();
            $table->text('growth_development_feeding')->nullable();
            $table->string('milestones_first_word')->nullable();
            $table->text('milestones_walking')->nullable();
            $table->text('milestones_teething')->nullable();
            $table->text('milestones_self_help')->nullable();
            $table->text('gross_motor')->nullable();
            $table->text('fine_motor')->nullable();
            $table->text('past_illness_history')->nullable();
            $table->text('observation')->nullable();
            $table->text('general_eaxamination')->nullable();
            $table->text('neurological_examination')->nullable();
            $table->text('oral_examination')->nullable();
            $table->text('head_neck_examination')->nullable();
            $table->text('language_evaluation')->nullable();
            $table->string('mode_of_communication')->nullable();
            $table->text('passive_language')->nullable();
            $table->text('active_language')->nullable();
            $table->text('nasality')->nullable();
            $table->text('dysfluency')->nullable();
            $table->text('change_of_voice')->nullable();
            $table->text('rate_of_speech')->nullable();
            $table->text('formal_language_assessment')->nullable();
            $table->text('psychometric_assessment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dld_sheet_reports');
    }
};
