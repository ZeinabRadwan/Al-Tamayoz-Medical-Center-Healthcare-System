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
        Schema::create('dysphagia_assessment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');

            $table->string('i1')->nullable(); // Date
            $table->string('i2')->nullable(); // Cause of referral
            $table->string('i3')->nullable(); // Name
            $table->string('i4')->nullable(); // Age
            $table->string('i5')->nullable(); // Sex
            $table->string('i6')->nullable(); // Residence
            $table->string('i7')->nullable(); // Education
            $table->string('i8')->nullable(); // Marital status
            $table->boolean('i9')->default(false); // Onset of problem: gradual
            $table->boolean('i10')->default(false); // Onset of problem: sudden after
            $table->string('i11')->nullable(); // Onset of problem: sudden after (details)
            $table->boolean('i12')->default(false); // Course: permanent
            $table->boolean('i13')->default(false); // Course: increasing
            $table->boolean('i14')->default(false); // Course: intermittent
            $table->boolean('i15')->default(false); // Course: decreasing
            $table->boolean('i16')->default(false); // Difficulty in swallowing: yes
            $table->boolean('i17')->default(false); // Difficulty in swallowing: no
            $table->boolean('i18')->default(false); // Difficulty in swallowing: food
            $table->boolean('i19')->default(false); // Difficulty in swallowing: fluids
            $table->boolean('i20')->default(false); // Difficulty in swallowing: pills
            $table->boolean('i21')->default(false); // Difficulty in swallowing related to another disease: yes
            $table->boolean('i22')->default(false); // Difficulty in swallowing related to another disease: no
            $table->string('i23')->nullable(); // Difficulty in swallowing related to another disease: what?
            $table->string('i24')->nullable(); // Coughing/chocking with food/fluids
            $table->boolean('i25')->default(false); // Wearing dentures: yes
            $table->boolean('i26')->default(false); // Wearing dentures: no
            $table->string('i27')->nullable(); // Feeling of food passing in the wrong path
            $table->boolean('i28')->default(false); // Special preparation of food: yes
            $table->boolean('i29')->default(false); // Special preparation of food: no
            $table->string('i30')->nullable(); // Special preparation of food: specify
            $table->boolean('i31')->default(false); // Special food to avoid: yes
            $table->boolean('i32')->default(false); // Special food to avoid: no
            $table->string('i33')->nullable(); // Special food to avoid: specify
            $table->boolean('i34')->default(false); // Food stays in mouth after swallowing: yes
            $table->boolean('i35')->default(false); // Food stays in mouth after swallowing: no
            $table->boolean('i36')->default(false); // Problem of food containment in mouth: yes
            $table->boolean('i37')->default(false); // Problem of food containment in mouth: no
            $table->boolean('i38')->default(false); // Nasal regurgitation of food: yes
            $table->boolean('i39')->default(false); // Nasal regurgitation of food: no
            $table->boolean('i40')->default(false); // Nasal regurgitation of fluids: yes
            $table->boolean('i41')->default(false); // Nasal regurgitation of fluids: no
            $table->boolean('i42')->default(false); // Cough related to food: yes
            $table->boolean('i43')->default(false); // Cough related to food: no
            $table->boolean('i44')->default(false); // Factors increasing dysphagia: yes
            $table->boolean('i45')->default(false); // Factors increasing dysphagia: no
            $table->string('i46')->nullable(); // Factors increasing dysphagia: specify
            $table->boolean('i47')->default(false); // Change in position affects dysphagia: yes
            $table->boolean('i48')->default(false); // Change in position affects dysphagia: no
            $table->boolean('i49')->default(false); // Change of voice: yes
            $table->boolean('i50')->default(false); // Change of voice: no
            $table->boolean('i51')->default(false); // Throat dryness: yes
            $table->boolean('i52')->default(false); // Throat dryness: no
            $table->boolean('i53')->default(false); // Throat tenderness: yes
            $table->boolean('i54')->default(false); // Throat tenderness: no
            $table->boolean('i55')->default(false); // Respiratory problem: yes
            $table->boolean('i56')->default(false); // Respiratory problem: no
            $table->boolean('i57')->default(false); // Heart burn: yes
            $table->boolean('i58')->default(false); // Heart burn: no
            $table->boolean('i59')->default(false); // Bowel habits: yes
            $table->boolean('i60')->default(false); // Bowel habits: no
            $table->boolean('i61')->default(false); // History of swallowing problems: yes
            $table->boolean('i62')->default(false); // History of swallowing problems: no
            $table->boolean('i63')->default(false); // Tracheostomy tube: yes
            $table->boolean('i64')->default(false); // Tracheostomy tube: no
            $table->string('i65')->nullable(); // Other medical problems
            $table->string('i66')->nullable(); // Drugs taken
            $table->string('i67')->nullable(); // Smoking
            $table->string('i68')->nullable(); // Hyperacidity / reflux
            $table->string('i69')->nullable(); // Allergic tendencies
            $table->string('i70')->nullable(); // Surgical intervention and trauma
            $table->string('i71')->nullable(); // History of aspiration pneumonia
            $table->string('i72')->nullable(); // Recurrent chest infection
            $table->string('i73')->nullable(); // Weight loss
            $table->string('i74')->nullable(); // History of swallowing problems
            $table->string('i75')->nullable(); // History of tracheostomy tube
            $table->string('i76')->nullable(); // PREFEEDING ASSESSMENT (OME)
            $table->boolean('i77')->default(false); // Structure: dentures
            $table->boolean('i78')->default(false); // Structure: caries
            $table->boolean('i79')->default(false); // Structure: decay
            $table->boolean('i80')->default(false); // Structure: missing teeth
            $table->string('i81')->nullable(); // Awareness
            $table->boolean('i82')->default(false); // Control of secretions: drooling
            $table->boolean('i83')->default(false); // Control of secretions: excess secretions in mouth
            $table->boolean('i84')->default(false); // Control of secretions: Jaw control
            $table->boolean('i85')->default(false); // Control of secretions: lip closure at rest
            $table->boolean('i86')->default(false); // Control of secretions: lip spreading and rounding
            $table->boolean('i87')->default(false); // Control of secretions: symmetry
            $table->boolean('i88')->default(false); // Control of secretions: lip smacking
            $table->boolean('i89')->default(false); // Lingual function: protrusion
            $table->boolean('i90')->default(false); // Lingual function: lick
            $table->boolean('i91')->default(false); // Lingual function: Lateralization
            $table->boolean('i92')->default(false); // Lingual function: elevation of back & tip
            $table->boolean('i93')->default(false); // Velar function: /a/
            $table->boolean('i94')->default(false); // Velar function: symmetry
            $table->boolean('i95')->default(false); // Resonance: N
            $table->boolean('i96')->default(false); // Resonance: Hyponasal
            $table->boolean('i97')->default(false); // Resonance: Hypernasal
            $table->boolean('i98')->default(false); // Reflexes: Swallow response
            $table->boolean('i99')->default(false); // Reflexes: Swallow response +ve
            $table->boolean('i100')->default(false); // Reflexes: Swallow response -ve
            $table->boolean('i101')->default(false); // Reflexes: Gag reflex +ve
            $table->boolean('i102')->default(false); // Reflexes: Gag reflex -ve
            $table->boolean('i103')->default(false); // Speech ineligibility: N
            $table->boolean('i104')->default(false); // Speech ineligibility: Dysarthia
            $table->boolean('i105')->default(false); // Speech ineligibility: Aphasia
            $table->boolean('i106')->default(false); // Diadchokinesia: /ptkptk/
            $table->boolean('i107')->default(false); // Glottal attack: N
            $table->string('i108')->nullable(); // APA: GRBAS
            $table->boolean('i109')->default(false); // Glottal attack: Soft
            $table->boolean('i110')->default(false); // Glottal attack: Hard
            $table->boolean('i111')->default(false); // Cognition: Orientation to day / date / place
            $table->boolean('i112')->default(false); // Cognition: Follow instructions
            $table->boolean('i113')->default(false); // Reduced alertness
            $table->boolean('i114')->default(false); // Absent swallow
            $table->boolean('i115')->default(false); // Absent productive cough
            $table->boolean('i116')->default(false); // Difficulty handling secretions
            $table->boolean('i117')->default(false); // Pharyngeal movement during swallow
            $table->string('i118')->nullable(); // TRIAL OF WATER TEST
            $table->string('i119')->nullable(); // Observation Of Eating: comment
            $table->string('i120')->nullable(); // INSTRUMENTAL EXAMINATION: FEES
            $table->string('i121')->nullable(); // INSTRUMENTAL EXAMINATION: VFSS
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dysphagia_assessment');
    }
};
