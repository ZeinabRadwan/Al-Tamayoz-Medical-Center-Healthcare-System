<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProtocolForVoiceEvaluationTable extends Migration
{
    public function up()
    {
        Schema::create('protocol_for_voice_evaluation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->string('referral_from', 255)->nullable();
            $table->date('evaluation_date')->nullable();
            $table->text('cause_of_referral')->nullable();
            $table->string('name', 255)->nullable();
            $table->string('age', 100)->nullable();
            $table->string('sex', 100)->nullable();
            $table->text('residence')->nullable();
            $table->text('education')->nullable();
            $table->text('occupation')->nullable();
            $table->text('material_state')->nullable();
            $table->string('children_no', 100)->nullable();
            $table->text('complaint_analysis')->nullable();
            $table->string('duration', 100)->nullable();
            $table->string('onset', 100)->nullable();
            $table->string('following', 100)->nullable();
            $table->string('course', 100)->nullable();

            $table->boolean('frequent_throat_clearing')->default(false);
            $table->boolean('sticky_throat_mucous')->default(false);
            $table->boolean('tenderness')->default(false);
            $table->boolean('dryness')->default(false);

            $table->boolean('severity_rating_zero')->default(false);
            $table->boolean('severity_rating_one')->default(false);
            $table->boolean('severity_rating_two')->default(false);
            $table->boolean('severity_rating_three')->default(false);
            $table->boolean('severity_rating_four')->default(false);


            $table->boolean('listeners_reaction_postive')->default(false);
            $table->boolean('listeners_reaction_negative')->default(false);

            $table->boolean('vocal_demand_high')->default(false);
            $table->boolean('vocal_demand_low')->default(false);


            $table->text('noise')->nullable();
            $table->string('relative_humidity', 100)->nullable();
            $table->string('temperature', 100)->nullable();
            $table->text('irritants')->nullable();
            $table->string('smoking_quantity', 100)->nullable();
            $table->string('smoking_duration', 100)->nullable();
            $table->string('smoking_temperature', 100)->nullable();
            $table->text('smoking_past_history')->nullable();

            $table->boolean('spirits_postive')->default(false);
            $table->boolean('spirits_negative')->default(false);
            $table->text('spirits_duration')->nullable();


            $table->boolean('temperament_quiet')->default(false);
            $table->boolean('temperament_tense')->default(false);


            $table->boolean('emotional_stress_postive')->default(false);
            $table->boolean('emotional_stress_negative')->default(false);


            $table->boolean('allergic_tendencies_postive')->default(false);
            $table->boolean('allergic_tendencies_negative')->default(false);


            $table->text('urt_infections')->nullable();
            $table->text('chronic_cough')->nullable();
            $table->text('breathing')->nullable();
            $table->text('chewing_swallowing')->nullable();
            $table->text('hyperacidity_reflux')->nullable();

            $table->boolean('positive')->default(false);
            $table->boolean('negative')->default(false);


            $table->text('medicaments')->nullable();
            $table->text('surgical_intervention')->nullable();
            $table->text('grbas')->nullable();
            $table->text('pitch')->nullable();


            $table->boolean('diplophonia_yes')->default(false);
            $table->boolean('diplophonia_no')->default(false);


            $table->boolean('register_1')->default(false);
            $table->boolean('register_2')->default(false);
            $table->boolean('register_3')->default(false);


            $table->boolean('vocal_fry_1')->default(false);
            $table->boolean('vocal_fry_2')->default(false);



            $table->boolean('register_break_1')->default(false);
            $table->boolean('register_break_2')->default(false);



            $table->boolean('loudness_ex')->default(false);
            $table->boolean('loudness_soft')->default(false);



            $table->text('glottal_attack')->nullable();

            $table->text('cough')->nullable();
            $table->text('whisper')->nullable();
            $table->text('laughter')->nullable();
            $table->text('oral_cavity')->nullable();


            $table->boolean('tonsils_postive')->default(false);
            $table->boolean('tonsils_negative')->default(false);


            $table->boolean('post_nasal_discharge_postive')->default(false);
            $table->boolean('post_nasal_discharge_negative')->default(false);


            $table->boolean('laryngeal_skeleton_normal')->default(false);


            $table->text('fractures')->nullable();

            $table->text('fracture_site')->nullable();
            $table->text('fracture_type')->nullable();

            $table->text('abnormalities')->nullable();

            $table->text('laryngeal_click')->nullable();
            $table->text('laryngeal_position')->nullable();
            $table->text('cervical_veins')->nullable();

            $table->boolean('neck_scars_yes')->default(false);


            $table->text('scar_type')->nullable();
            $table->text('scar_site')->nullable();
            $table->string('scar_size', 100)->nullable();

            $table->boolean('neck_scars_no')->default(false);


            $table->text('vocal_color')->nullable();
            $table->text('vocal_luster')->nullable();
            $table->text('vocal_transparency')->nullable();
            $table->text('vascular_markings')->nullable();
            $table->text('swelling')->nullable();

            $table->boolean('edge')->default(false);
            $table->boolean('surface')->default(false);

            $table->boolean('has_ulcers_1')->default(false);
            $table->boolean('has_ulcers_2')->default(false);

            $table->text('ulcer_site')->nullable();
            $table->string('ulcer_size', 100)->nullable();
            $table->string('ulcer_floor', 100)->nullable();
            $table->string('ulcer_edge', 100)->nullable();


            $table->string('girth', 100)->nullable();
            $table->boolean('glottis_symmetry')->default();
            $table->boolean('glottis_asymmetry')->default();


            $table->boolean('has_deviation_1')->default(false);
            $table->boolean('has_deviation_2')->default(false);


            $table->text('deviation_to')->nullable();



            $table->boolean('has_glottic_gap_1')->default(false);
            $table->boolean('has_glottic_gap_2')->default(false);


            $table->text('glottic_gap_site')->nullable();
            $table->string('glottic_gap_size', 100)->nullable();


            $table->boolean('phonatory_waste_1')->default(false);
            $table->boolean('phonatory_waste_2')->default(false);


            $table->text('respiratory_chink')->nullable();

            $table->boolean('phase_closure_open')->default(false);
            $table->boolean('phase_closure_closed')->default(false);



            $table->boolean('stroboscopic_fixation_1')->default(false);
            $table->boolean('stroboscopic_fixation_2')->default(false);


            $table->text('segment')->nullable();
            $table->text('morphological_findings')->nullable();
            $table->text('ventricular_color')->nullable();
            $table->text('ventricular_masses')->nullable();
            $table->text('ventricular_girth')->nullable();
            $table->text('phonation_position')->nullable();
            $table->text('acoustic_analysis')->nullable();
            $table->text('radiological_studies')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('protocol_for_voice_evaluation');
    }
}
