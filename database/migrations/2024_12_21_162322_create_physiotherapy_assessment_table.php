<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('physiotherapy_assessment', function (Blueprint $table) {
    //         $table->id();
    //         // Patient Information
    //         $table->unsignedBigInteger('patient_id');
    //         $table->foreign('patient_id')->references('id')->on('patients');

    //         // Patient Basic Information
    //         $table->text('patient_name')->nullable();
    //         $table->text('diagnosis')->nullable();
    //         $table->text('nationality')->nullable();
    //         $table->text('patient_age')->nullable();
    //         $table->text('occupation')->nullable();
    //         $table->text('id_mrn')->nullable();

    //         // Gender
    //         $table->boolean('gender_female')->default(false);
    //         $table->boolean('gender_male')->default(false);

    //         // Civil Status
    //         $table->boolean('civil_status_single')->default(false);
    //         $table->boolean('civil_status_married')->default(false);

    //         // Medical History
    //         $table->text('history_of_trauma_illness')->nullable();
    //         $table->text('history_of_trauma_illness_date')->nullable();
    //         $table->text('medical_history_chief_complain')->nullable();
    //         $table->text('xray_other_ex')->nullable();
    //         $table->text('pain_level_vas')->nullable();

    //         // Skin and Soft Tissues
    //         $table->text('swelling_right')->nullable();
    //         $table->text('swelling_left')->nullable();
    //         $table->text('callus_right')->nullable();
    //         $table->text('callus_left')->nullable();
    //         $table->text('scar_right')->nullable();
    //         $table->text('scar_left')->nullable();
    //         $table->text('wound_right')->nullable();
    //         $table->text('wound_left')->nullable();
    //         $table->text('temperature_right')->nullable();
    //         $table->text('temperature_left')->nullable();
    //         $table->text('infection_right')->nullable();
    //         $table->text('infection_left')->nullable();
    //         $table->text('pain_right')->nullable();
    //         $table->text('pain_left')->nullable();
    //         $table->text('abnormal_sensation_right')->nullable();
    //         $table->text('abnormal_sensation_left')->nullable();

    //         // Range of Motion
    //         // Extension
    //         $table->text('extension_0_1')->nullable();
    //         $table->text('extension_0_2')->nullable();
    //         $table->text('extension_0_3')->nullable();
    //         $table->text('extension_0_4')->nullable();

    //         // Ankle-Foot
    //         $table->text('ankle_foot_1')->nullable();
    //         $table->text('ankle_foot_2')->nullable();
    //         $table->text('ankle_foot_3')->nullable();
    //         $table->text('ankle_foot_4')->nullable();

    //         // Dorsi Flexion
    //         $table->text('dorsi_flexion_1')->nullable();
    //         $table->text('dorsi_flexion_2')->nullable();
    //         $table->text('dorsi_flexion_3')->nullable();
    //         $table->text('dorsi_flexion_4')->nullable();

    //         // Plantar Flexion
    //         $table->text('plantar_flexion_1')->nullable();
    //         $table->text('plantar_flexion_2')->nullable();
    //         $table->text('plantar_flexion_3')->nullable();
    //         $table->text('plantar_flexion_4')->nullable();

    //         // Inversion
    //         $table->text('inversion_1')->nullable();
    //         $table->text('inversion_2')->nullable();
    //         $table->text('inversion_3')->nullable();
    //         $table->text('inversion_4')->nullable();

    //         // Eversion
    //         $table->text('eversion_1')->nullable();
    //         $table->text('eversion_2')->nullable();
    //         $table->text('eversion_3')->nullable();
    //         $table->text('eversion_4')->nullable();

    //         // Neck
    //         $table->text('neck_flexion_1')->nullable();
    //         $table->text('neck_flexion_2')->nullable();
    //         $table->text('neck_flexion_3')->nullable();
    //         $table->text('neck_flexion_4')->nullable();

    //         $table->text('neck_extension_1')->nullable();
    //         $table->text('neck_extension_2')->nullable();
    //         $table->text('neck_extension_3')->nullable();
    //         $table->text('neck_extension_4')->nullable();

    //         $table->text('neck_latero_flexion_r_1')->nullable();
    //         $table->text('neck_latero_flexion_r_2')->nullable();
    //         $table->text('neck_latero_flexion_r_3')->nullable();
    //         $table->text('neck_latero_flexion_r_4')->nullable();

    //         $table->text('neck_latero_flexion_l_1')->nullable();
    //         $table->text('neck_latero_flexion_l_2')->nullable();
    //         $table->text('neck_latero_flexion_l_3')->nullable();
    //         $table->text('neck_latero_flexion_l_4')->nullable();

    //         // Trunk
    //         $table->text('global_flexion_1')->nullable();
    //         $table->text('global_flexion_2')->nullable();
    //         $table->text('global_flexion_3')->nullable();
    //         $table->text('global_flexion_4')->nullable();

    //         $table->text('thoracic_flexion_1')->nullable();
    //         $table->text('thoracic_flexion_2')->nullable();
    //         $table->text('thoracic_flexion_3')->nullable();
    //         $table->text('thoracic_flexion_4')->nullable();

    //         $table->text('lumbar_flexion_1')->nullable();
    //         $table->text('lumbar_flexion_2')->nullable();
    //         $table->text('lumbar_flexion_3')->nullable();
    //         $table->text('lumbar_flexion_4')->nullable();

    //         $table->text('global_extension_1')->nullable();
    //         $table->text('global_extension_2')->nullable();
    //         $table->text('global_extension_3')->nullable();
    //         $table->text('global_extension_4')->nullable();

    //         $table->text('latero_flexion_r_1')->nullable();
    //         $table->text('latero_flexion_r_2')->nullable();
    //         $table->text('latero_flexion_r_3')->nullable();
    //         $table->text('latero_flexion_r_4')->nullable();

    //         $table->text('latero_flexion_l_1')->nullable();
    //         $table->text('latero_flexion_l_2')->nullable();
    //         $table->text('latero_flexion_l_3')->nullable();
    //         $table->text('latero_flexion_l_4')->nullable();

    //         $table->text('rotation_r_1')->nullable();
    //         $table->text('rotation_r_2')->nullable();
    //         $table->text('rotation_r_3')->nullable();
    //         $table->text('rotation_r_4')->nullable();

    //         $table->text('rotation_l_1')->nullable();
    //         $table->text('rotation_l_2')->nullable();
    //         $table->text('rotation_l_3')->nullable();
    //         $table->text('rotation_l_4')->nullable();

    //         // Lower Limb Date Assessment and Follow Up
    //         $table->text('lower_limb_date_assessment')->nullable();
    //         $table->text('lower_limb_date_follow_up')->nullable();

    //         // Shoulder
    //         $table->text('shoulder_extension_l_1')->nullable();
    //         $table->text('shoulder_extension_r_1')->nullable();
    //         $table->text('shoulder_extension_l_2')->nullable();
    //         $table->text('shoulder_extension_r_2')->nullable();

    //         $table->text('shoulder_abduction_l_1')->nullable();
    //         $table->text('shoulder_abduction_r_1')->nullable();
    //         $table->text('shoulder_abduction_l_2')->nullable();
    //         $table->text('shoulder_abduction_r_2')->nullable();

    //         $table->text('shoulder_adduction_l_1')->nullable();
    //         $table->text('shoulder_adduction_r_1')->nullable();
    //         $table->text('shoulder_adduction_l_2')->nullable();
    //         $table->text('shoulder_adduction_r_2')->nullable();

    //         $table->text('shoulder_medial_rotation_l_1')->nullable();
    //         $table->text('shoulder_medial_rotation_r_1')->nullable();
    //         $table->text('shoulder_medial_rotation_l_2')->nullable();
    //         $table->text('shoulder_medial_rotation_r_2')->nullable();

    //         $table->text('shoulder_lateral_rotation_l_1')->nullable();
    //         $table->text('shoulder_lateral_rotation_r_1')->nullable();
    //         $table->text('shoulder_lateral_rotation_l_2')->nullable();
    //         $table->text('shoulder_lateral_rotation_r_2')->nullable();

    //         // Elbow
    //         $table->text('elbow_flexion_l_1')->nullable();
    //         $table->text('elbow_flexion_r_1')->nullable();
    //         $table->text('elbow_flexion_l_2')->nullable();
    //         $table->text('elbow_flexion_r_2')->nullable();

    //         $table->text('elbow_extension_l_1')->nullable();
    //         $table->text('elbow_extension_r_1')->nullable();
    //         $table->text('elbow_extension_l_2')->nullable();
    //         $table->text('elbow_extension_r_2')->nullable();

    //         // Forearm
    //         $table->text('forearm_pronation_l_1')->nullable();
    //         $table->text('forearm_pronation_r_1')->nullable();
    //         $table->text('forearm_pronation_l_2')->nullable();
    //         $table->text('forearm_pronation_r_2')->nullable();

    //         $table->text('forearm_supination_l_1')->nullable();
    //         $table->text('forearm_supination_r_1')->nullable();
    //         $table->text('forearm_supination_l_2')->nullable();
    //         $table->text('forearm_supination_r_2')->nullable();

    //         // Wrist
    //         $table->text('wrist_flexion_l_1')->nullable();
    //         $table->text('wrist_flexion_r_1')->nullable();
    //         $table->text('wrist_flexion_l_2')->nullable();
    //         $table->text('wrist_flexion_r_2')->nullable();

    //         $table->text('wrist_extension_l_1')->nullable();
    //         $table->text('wrist_extension_r_1')->nullable();
    //         $table->text('wrist_extension_l_2')->nullable();
    //         $table->text('wrist_extension_r_2')->nullable();

    //         $table->text('wrist_abduction_l_1')->nullable();
    //         $table->text('wrist_abduction_r_1')->nullable();
    //         $table->text('wrist_abduction_l_2')->nullable();
    //         $table->text('wrist_abduction_r_2')->nullable();

    //         $table->text('wrist_adduction_l_1')->nullable();
    //         $table->text('wrist_adduction_r_1')->nullable();
    //         $table->text('wrist_adduction_l_2')->nullable();
    //         $table->text('wrist_adduction_r_2')->nullable();

    //         // Fingers
    //         $table->text('finger_thumb_opposition_l_1')->nullable();
    //         $table->text('finger_thumb_opposition_r_1')->nullable();
    //         $table->text('finger_thumb_opposition_l_2')->nullable();
    //         $table->text('finger_thumb_opposition_r_2')->nullable();

    //         $table->text('finger_mp_flexion_l_1')->nullable();
    //         $table->text('finger_mp_flexion_r_1')->nullable();
    //         $table->text('finger_mp_flexion_l_2')->nullable();
    //         $table->text('finger_mp_flexion_r_2')->nullable();

    //         $table->text('finger_mp_extension_l_1')->nullable();
    //         $table->text('finger_mp_extension_r_1')->nullable();
    //         $table->text('finger_mp_extension_l_2')->nullable();
    //         $table->text('finger_mp_extension_r_2')->nullable();

    //         $table->text('finger_ip_flexion_l_1')->nullable();
    //         $table->text('finger_ip_flexion_r_1')->nullable();
    //         $table->text('finger_ip_flexion_l_2')->nullable();
    //         $table->text('finger_ip_flexion_r_2')->nullable();

    //         // Remarks
    //         $table->text('remarks')->nullable();

    //         // Muscle Test
    //         $table->boolean('muscle_test')->default(false);

    //         // Lower Limb
    //         $table->text('lower_limb_rt')->nullable();
    //         $table->text('lower_limb_lt')->nullable();
    //         $table->text('neck_span')->nullable();

    //         // Upper Limb
    //         $table->text('upper_limb_rt')->nullable();
    //         $table->text('upper_limb_lt')->nullable();
    //         $table->text('trunk_span')->nullable();

    //         // Muscle Tone
    //         $table->boolean('hypertonia')->default(false);
    //         $table->boolean('hypotonia')->default(false);

    //         // Functional Evaluation - Balance
    //         $table->boolean('static_sitting_normal')->default(false);
    //         $table->boolean('static_sitting_good')->default(false);
    //         $table->boolean('static_sitting_poor')->default(false);
    //         $table->boolean('static_sitting_not_possible')->default(false);

    //         $table->boolean('static_standing_normal')->default(false);
    //         $table->boolean('static_standing_good')->default(false);
    //         $table->boolean('static_standing_poor')->default(false);
    //         $table->boolean('sstatic_tanding_not_possible')->default(false);

    //         $table->boolean('dynamic_sitting_normal')->default(false);
    //         $table->boolean('dynamic_sitting_good')->default(false);
    //         $table->boolean('dynamic_sitting_poor')->default(false);
    //         $table->boolean('dynamic_sitting_not_possible')->default(false);

    //         $table->boolean('dynamic_standing_normal')->default(false);
    //         $table->boolean('dynamic_standing_good')->default(false);
    //         $table->boolean('dynamic_standing_poor')->default(false);
    //         $table->boolean('dynamic_standing_not_possible')->default(false);

    //         // Coordination
    //         $table->boolean('upper_limbs_good')->default(false);
    //         $table->boolean('upper_limbs_poor')->default(false);
    //         $table->boolean('upper_limbs_not_possible')->default(false);

    //         $table->boolean('lower_limbs_good')->default(false);
    //         $table->boolean('lower_limbs_poor')->default(false);
    //         $table->boolean('lower_limbs_not_possible')->default(false);

    //         $table->text('coordination_comments')->nullable();


    //         $table->text('i0')->nullable();
    //         $table->text('i1')->nullable();
    //         $table->text('i2')->nullable();
    //         $table->text('i3')->nullable();
    //         $table->text('i4')->nullable();
    //         $table->text('i5')->nullable();
    //         $table->text('i6')->nullable();
    //         $table->text('i7')->nullable();
    //         $table->text('i8')->nullable();
    //         $table->text('i9')->nullable();
    //         $table->text('i10')->nullable();
    //         $table->text('i11')->nullable();
    //         $table->text('i12')->nullable();
    //         $table->text('i13')->nullable();
    //         $table->text('i14')->nullable();
    //         $table->text('i15')->nullable();
    //         $table->text('i16')->nullable();
    //         $table->text('i17')->nullable();
    //         $table->text('i18')->nullable();
    //         $table->text('i19')->nullable();
    //         $table->text('i20')->nullable();
    //         $table->text('i21')->nullable();
    //         $table->text('i22')->nullable();
    //         $table->text('i23')->nullable();
    //         $table->text('i24')->nullable();
    //         $table->text('i25')->nullable();
    //         $table->text('i26')->nullable();
    //         $table->text('i27')->nullable();
    //         $table->text('i28')->nullable();
    //         $table->text('i29')->nullable();
    //         $table->text('i30')->nullable();
    //         $table->text('i31')->nullable();
    //         $table->text('i32')->nullable();
    //         $table->text('i33')->nullable();
    //         $table->text('i34')->nullable();
    //         $table->text('i35')->nullable();
    //         $table->text('i36')->nullable();
    //         $table->text('i37')->nullable();
    //         $table->text('i38')->nullable();
    //         $table->text('i39')->nullable();
    //         $table->text('i40')->nullable();
    //         $table->text('i41')->nullable();
    //         $table->text('i42')->nullable();
    //         $table->text('i43')->nullable();
    //         $table->text('i44')->nullable();
    //         $table->text('i45')->nullable();
    //         $table->text('i46')->nullable();
    //         $table->text('i47')->nullable();
    //         $table->text('i48')->nullable();
    //         $table->text('i49')->nullable();
    //         $table->text('i50')->nullable();
    //         $table->text('i51')->nullable();
    //         $table->text('i52')->nullable();
    //         $table->text('i53')->nullable();
    //         $table->text('i54')->nullable();
    //         $table->text('i55')->nullable();
    //         $table->text('i56')->nullable();
    //         $table->text('i57')->nullable();
    //         $table->text('i58')->nullable();
    //         $table->text('i59')->nullable();
    //         $table->text('i60')->nullable();
    //         $table->text('i61')->nullable();
    //         $table->text('i62')->nullable();
    //         $table->text('i63')->nullable();
    //         $table->text('i64')->nullable();
    //         $table->text('i65')->nullable();
    //         $table->text('i66')->nullable();
    //         $table->text('i67')->nullable();
    //         $table->text('i68')->nullable();
    //         $table->text('i69')->nullable();
    //         $table->text('i70')->nullable();
    //         $table->text('i71')->nullable();
    //         $table->text('i72')->nullable();
    //         $table->text('i73')->nullable();
    //         $table->text('i74')->nullable();
    //         $table->text('i75')->nullable();
    //         $table->text('i76')->nullable();
    //         $table->text('i77')->nullable();
    //         $table->text('i78')->nullable();
    //         $table->text('i79')->nullable();
    //         $table->text('i80')->nullable();
    //         $table->text('i81')->nullable();
    //         $table->text('i82')->nullable();
    //         $table->text('i83')->nullable();
    //         $table->text('i84')->nullable();
    //         $table->text('i85')->nullable();
    //         $table->text('i86')->nullable();
    //         $table->text('i87')->nullable();
    //         $table->text('i88')->nullable();
    //         $table->text('i89')->nullable();
    //         $table->text('i90')->nullable();
    //         $table->text('i91')->nullable();
    //         $table->text('i92')->nullable();
    //         $table->text('i93')->nullable();
    //         $table->text('i94')->nullable();
    //         $table->text('i95')->nullable();
    //         $table->text('i96')->nullable();
    //         $table->text('i97')->nullable();
    //         $table->text('i98')->nullable();
    //         $table->text('i99')->nullable();
    //         $table->text('i100')->nullable();
    //         $table->text('i101')->nullable();
    //         $table->text('i102')->nullable();
    //         $table->text('i103')->nullable();
    //         $table->text('i104')->nullable();
    //         $table->text('i105')->nullable();
    //         $table->text('i106')->nullable();
    //         $table->text('i107')->nullable();
    //         $table->text('i108')->nullable();
    //         $table->text('i109')->nullable();
    //         $table->text('i110')->nullable();
    //         $table->text('i111')->nullable();
    //         $table->text('i112')->nullable();
    //         $table->text('i113')->nullable();
    //         $table->text('i114')->nullable();
    //         $table->text('i115')->nullable();
    //         $table->text('i116')->nullable();
    //         $table->text('i117')->nullable();
    //         $table->text('i118')->nullable();
    //         $table->text('i119')->nullable();
    //         $table->text('i120')->nullable();
    //         $table->text('i121')->nullable();
    //         $table->text('i122')->nullable();
    //         $table->text('i123')->nullable();
    //         $table->text('i124')->nullable();
    //         $table->text('i125')->nullable();
    //         $table->text('i126')->nullable();
    //         $table->text('i127')->nullable();
    //         $table->text('i128')->nullable();
    //         $table->text('i129')->nullable();
    //         $table->text('i130')->nullable();
    //         $table->text('i131')->nullable();
    //         $table->text('i132')->nullable();
    //         $table->text('i133')->nullable();
    //         $table->text('i134')->nullable();
    //         $table->text('i135')->nullable();
    //         $table->text('i136')->nullable();
    //         $table->text('i137')->nullable();
    //         $table->text('i138')->nullable();
    //         $table->text('i139')->nullable();
    //         $table->text('i140')->nullable();
    //         $table->text('i141')->nullable();
    //         $table->text('i142')->nullable();
    //         $table->text('i143')->nullable();
    //         $table->text('i144')->nullable();
    //         $table->text('i145')->nullable();
    //         $table->text('i146')->nullable();
    //         $table->text('i147')->nullable();



    //         // Treatment Plan of Care
    //         $table->json('problems_list')->nullable();
    //         $table->json('short_term_goals')->nullable();
    //         $table->json('long_term_goals')->nullable();

    //         $table->json('problems_list_6')->nullable();
    //         $table->json('short_term_goals_6')->nullable();
    //         $table->json('long_term_goals_6')->nullable();

    //         $table->json('problems_list_12')->nullable();
    //         $table->json('short_term_goals_12')->nullable();
    //         $table->json('long_term_goals_12')->nullable();


    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('physiotherapy_assessment');
    }
};
