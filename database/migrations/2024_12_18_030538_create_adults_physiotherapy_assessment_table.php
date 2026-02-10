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
        Schema::create('adults_physiotherapy_assessment', function (Blueprint $table) {
            $table->id();

            // Patient Information
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');

            // Patient Basic Information
            $table->text('patient_name')->nullable();
            $table->text('diagnosis')->nullable();
            $table->text('nationality')->nullable();
            $table->text('patient_age')->nullable();
            $table->text('occupation')->nullable();
            $table->text('id_mrn')->nullable();

            // Gender
            $table->boolean('gender_female')->default(false);
            $table->boolean('gender_male')->default(false);

            // Civil Status
            $table->boolean('civil_status_single')->default(false);
            $table->boolean('civil_status_married')->default(false);

            // Medical History
            $table->text('history_of_trauma_illness')->nullable();
            $table->date('history_of_trauma_illness_date')->nullable();
            $table->text('medical_history_chief_complain')->nullable();
            $table->text('xray_other_ex')->nullable();
            $table->text('pain_level_vas')->nullable();

            // Skin and Soft Tissues
            $table->text('swelling_right')->nullable();
            $table->text('swelling_left')->nullable();
            $table->text('callus_right')->nullable();
            $table->text('callus_left')->nullable();
            $table->text('scar_right')->nullable();
            $table->text('scar_left')->nullable();
            $table->text('wound_right')->nullable();
            $table->text('wound_left')->nullable();
            $table->text('temperature_right')->nullable();
            $table->text('temperature_left')->nullable();
            $table->text('infection_right')->nullable();
            $table->text('infection_left')->nullable();
            $table->text('pain_right')->nullable();
            $table->text('pain_left')->nullable();
            $table->text('abnormal_sensation_right')->nullable();
            $table->text('abnormal_sensation_left')->nullable();

            // Range of Motion
            // Extension
            $table->text('extension_0_1')->nullable();
            $table->text('extension_0_2')->nullable();
            $table->text('extension_0_3')->nullable();
            $table->text('extension_0_4')->nullable();

            // Ankle-Foot
            $table->text('ankle_foot_1')->nullable();
            $table->text('ankle_foot_2')->nullable();
            $table->text('ankle_foot_3')->nullable();
            $table->text('ankle_foot_4')->nullable();

            // Dorsi Flexion
            $table->text('dorsi_flexion_1')->nullable();
            $table->text('dorsi_flexion_2')->nullable();
            $table->text('dorsi_flexion_3')->nullable();
            $table->text('dorsi_flexion_4')->nullable();

            // Plantar Flexion
            $table->text('plantar_flexion_1')->nullable();
            $table->text('plantar_flexion_2')->nullable();
            $table->text('plantar_flexion_3')->nullable();
            $table->text('plantar_flexion_4')->nullable();

            // Inversion
            $table->text('inversion_1')->nullable();
            $table->text('inversion_2')->nullable();
            $table->text('inversion_3')->nullable();
            $table->text('inversion_4')->nullable();

            // Eversion
            $table->text('eversion_1')->nullable();
            $table->text('eversion_2')->nullable();
            $table->text('eversion_3')->nullable();
            $table->text('eversion_4')->nullable();

            // Neck
            $table->text('neck_flexion_1')->nullable();
            $table->text('neck_flexion_2')->nullable();
            $table->text('neck_flexion_3')->nullable();
            $table->text('neck_flexion_4')->nullable();

            $table->text('neck_extension_1')->nullable();
            $table->text('neck_extension_2')->nullable();
            $table->text('neck_extension_3')->nullable();
            $table->text('neck_extension_4')->nullable();

            $table->text('neck_latero_flexion_r_1')->nullable();
            $table->text('neck_latero_flexion_r_2')->nullable();
            $table->text('neck_latero_flexion_r_3')->nullable();
            $table->text('neck_latero_flexion_r_4')->nullable();

            $table->text('neck_latero_flexion_l_1')->nullable();
            $table->text('neck_latero_flexion_l_2')->nullable();
            $table->text('neck_latero_flexion_l_3')->nullable();
            $table->text('neck_latero_flexion_l_4')->nullable();

            // Trunk
            $table->text('global_flexion_1')->nullable();
            $table->text('global_flexion_2')->nullable();
            $table->text('global_flexion_3')->nullable();
            $table->text('global_flexion_4')->nullable();

            $table->text('thoracic_flexion_1')->nullable();
            $table->text('thoracic_flexion_2')->nullable();
            $table->text('thoracic_flexion_3')->nullable();
            $table->text('thoracic_flexion_4')->nullable();

            $table->text('lumbar_flexion_1')->nullable();
            $table->text('lumbar_flexion_2')->nullable();
            $table->text('lumbar_flexion_3')->nullable();
            $table->text('lumbar_flexion_4')->nullable();

            $table->text('global_extension_1')->nullable();
            $table->text('global_extension_2')->nullable();
            $table->text('global_extension_3')->nullable();
            $table->text('global_extension_4')->nullable();

            $table->text('latero_flexion_r_1')->nullable();
            $table->text('latero_flexion_r_2')->nullable();
            $table->text('latero_flexion_r_3')->nullable();
            $table->text('latero_flexion_r_4')->nullable();

            $table->text('latero_flexion_l_1')->nullable();
            $table->text('latero_flexion_l_2')->nullable();
            $table->text('latero_flexion_l_3')->nullable();
            $table->text('latero_flexion_l_4')->nullable();

            $table->text('rotation_r_1')->nullable();
            $table->text('rotation_r_2')->nullable();
            $table->text('rotation_r_3')->nullable();
            $table->text('rotation_r_4')->nullable();

            $table->text('rotation_l_1')->nullable();
            $table->text('rotation_l_2')->nullable();
            $table->text('rotation_l_3')->nullable();
            $table->text('rotation_l_4')->nullable();

            // Lower Limb Date Assessment and Follow Up
            $table->text('lower_limb_date_assessment')->nullable();
            $table->text('lower_limb_date_follow_up')->nullable();

            // Shoulder
            $table->text('shoulder_extension_l_1')->nullable();
            $table->text('shoulder_extension_r_1')->nullable();
            $table->text('shoulder_extension_l_2')->nullable();
            $table->text('shoulder_extension_r_2')->nullable();

            $table->text('shoulder_abduction_l_1')->nullable();
            $table->text('shoulder_abduction_r_1')->nullable();
            $table->text('shoulder_abduction_l_2')->nullable();
            $table->text('shoulder_abduction_r_2')->nullable();

            $table->text('shoulder_adduction_l_1')->nullable();
            $table->text('shoulder_adduction_r_1')->nullable();
            $table->text('shoulder_adduction_l_2')->nullable();
            $table->text('shoulder_adduction_r_2')->nullable();

            $table->text('shoulder_medial_rotation_l_1')->nullable();
            $table->text('shoulder_medial_rotation_r_1')->nullable();
            $table->text('shoulder_medial_rotation_l_2')->nullable();
            $table->text('shoulder_medial_rotation_r_2')->nullable();

            $table->text('shoulder_lateral_rotation_l_1')->nullable();
            $table->text('shoulder_lateral_rotation_r_1')->nullable();
            $table->text('shoulder_lateral_rotation_l_2')->nullable();
            $table->text('shoulder_lateral_rotation_r_2')->nullable();

            // Elbow
            $table->text('elbow_flexion_l_1')->nullable();
            $table->text('elbow_flexion_r_1')->nullable();
            $table->text('elbow_flexion_l_2')->nullable();
            $table->text('elbow_flexion_r_2')->nullable();

            $table->text('elbow_extension_l_1')->nullable();
            $table->text('elbow_extension_r_1')->nullable();
            $table->text('elbow_extension_l_2')->nullable();
            $table->text('elbow_extension_r_2')->nullable();

            // Forearm
            $table->text('forearm_pronation_l_1')->nullable();
            $table->text('forearm_pronation_r_1')->nullable();
            $table->text('forearm_pronation_l_2')->nullable();
            $table->text('forearm_pronation_r_2')->nullable();

            $table->text('forearm_supination_l_1')->nullable();
            $table->text('forearm_supination_r_1')->nullable();
            $table->text('forearm_supination_l_2')->nullable();
            $table->text('forearm_supination_r_2')->nullable();

            // Wrist
            $table->text('wrist_flexion_l_1')->nullable();
            $table->text('wrist_flexion_r_1')->nullable();
            $table->text('wrist_flexion_l_2')->nullable();
            $table->text('wrist_flexion_r_2')->nullable();

            $table->text('wrist_extension_l_1')->nullable();
            $table->text('wrist_extension_r_1')->nullable();
            $table->text('wrist_extension_l_2')->nullable();
            $table->text('wrist_extension_r_2')->nullable();

            $table->text('wrist_abduction_l_1')->nullable();
            $table->text('wrist_abduction_r_1')->nullable();
            $table->text('wrist_abduction_l_2')->nullable();
            $table->text('wrist_abduction_r_2')->nullable();

            $table->text('wrist_adduction_l_1')->nullable();
            $table->text('wrist_adduction_r_1')->nullable();
            $table->text('wrist_adduction_l_2')->nullable();
            $table->text('wrist_adduction_r_2')->nullable();

            // Fingers
            $table->text('finger_thumb_opposition_l_1')->nullable();
            $table->text('finger_thumb_opposition_r_1')->nullable();
            $table->text('finger_thumb_opposition_l_2')->nullable();
            $table->text('finger_thumb_opposition_r_2')->nullable();

            $table->text('finger_mp_flexion_l_1')->nullable();
            $table->text('finger_mp_flexion_r_1')->nullable();
            $table->text('finger_mp_flexion_l_2')->nullable();
            $table->text('finger_mp_flexion_r_2')->nullable();

            $table->text('finger_mp_extension_l_1')->nullable();
            $table->text('finger_mp_extension_r_1')->nullable();
            $table->text('finger_mp_extension_l_2')->nullable();
            $table->text('finger_mp_extension_r_2')->nullable();

            $table->text('finger_ip_flexion_l_1')->nullable();
            $table->text('finger_ip_flexion_r_1')->nullable();
            $table->text('finger_ip_flexion_l_2')->nullable();
            $table->text('finger_ip_flexion_r_2')->nullable();

            // Remarks
            $table->text('remarks')->nullable();

            // Muscle Test
            $table->boolean('muscle_test')->default(false);

            // Lower Limb
            $table->text('lower_limb_rt')->nullable();
            $table->text('lower_limb_lt')->nullable();
            $table->text('neck_span')->nullable();

            // Upper Limb
            $table->text('upper_limb_rt')->nullable();
            $table->text('upper_limb_lt')->nullable();
            $table->text('trunk_span')->nullable();

            // Muscle Tone
            $table->boolean('hypertonia')->default(false);
            $table->boolean('hypotonia')->default(false);

            // Functional Evaluation - Balance
            $table->boolean('static_sitting_normal')->default(false);
            $table->boolean('static_sitting_good')->default(false);
            $table->boolean('static_sitting_poor')->default(false);
            $table->boolean('static_sitting_not_possible')->default(false);

            $table->boolean('static_standing_normal')->default(false);
            $table->boolean('static_standing_good')->default(false);
            $table->boolean('static_standing_poor')->default(false);
            $table->boolean('sstatic_tanding_not_possible')->default(false);

            $table->boolean('dynamic_sitting_normal')->default(false);
            $table->boolean('dynamic_sitting_good')->default(false);
            $table->boolean('dynamic_sitting_poor')->default(false);
            $table->boolean('dynamic_sitting_not_possible')->default(false);

            $table->boolean('dynamic_standing_normal')->default(false);
            $table->boolean('dynamic_standing_good')->default(false);
            $table->boolean('dynamic_standing_poor')->default(false);
            $table->boolean('dynamic_standing_not_possible')->default(false);

            // Coordination
            $table->boolean('upper_limbs_good')->default(false);
            $table->boolean('upper_limbs_poor')->default(false);
            $table->boolean('upper_limbs_not_possible')->default(false);

            $table->boolean('lower_limbs_good')->default(false);
            $table->boolean('lower_limbs_poor')->default(false);
            $table->boolean('lower_limbs_not_possible')->default(false);

            $table->text('coordination_comments')->nullable();

            // Treatment Plan of Care
            $table->json('problems_list')->nullable();
            $table->json('short_term_goals')->nullable();
            $table->json('long_term_goals')->nullable();

            $table->json('problems_list_6')->nullable();
            $table->json('short_term_goals_6')->nullable();
            $table->json('long_term_goals_6')->nullable();

            $table->json('problems_list_12')->nullable();
            $table->json('short_term_goals_12')->nullable();
            $table->json('long_term_goals_12')->nullable();

            


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adults_physiotherapy_assessment');
    }
};
