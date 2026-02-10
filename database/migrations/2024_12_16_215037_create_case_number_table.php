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
        Schema::create('case_number', function (Blueprint $table) {
            $table->id();
            // patient_id foreign key
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');

            $table->string('name')->nullable();
            $table->integer('age')->nullable();
            $table->enum('sex', ['M', 'F'])->nullable(); // i3
            $table->string('pregnancy')->nullable(); // i4
            $table->string('consanguinity')->nullable(); // i5
            $table->string('siblings_conditions')->nullable(); // i6
            $table->string('main_dx')->nullable(); // i7
            $table->string('term')->nullable(); // i8
            $table->boolean('nicu')->default(false); // i9
            $table->boolean('cyanosis')->default(false); // i10
            $table->boolean('jaundice')->default(false); // i11
            $table->string('feeding_at_birth')->nullable(); // i12
            $table->string('solid_feeds_start')->nullable(); // i13
            $table->boolean('tube_dependent_1')->default(false); // i14
            $table->boolean('tube_dependent_2')->default(false); // i15
            $table->boolean('tube_dependent_3')->default(false); // i16
            $table->boolean('oral_feeding_4')->default(false); // i17
            $table->boolean('oral_feeding_5')->default(false); // i18
            $table->boolean('oral_feeding_6')->default(false); // i19
            $table->boolean('oral_feeding_7')->default(false); // i20
            $table->string('textures_eaten')->nullable(); // i21
            $table->string('last_day_feeds')->nullable(); // i22
            $table->string('mch_score')->nullable(); // i23
            $table->string('eat10_score')->nullable(); // i24
            $table->string('respiratory_symptom')->nullable(); // i25
            $table->boolean('masses_positive')->default(false); // i26
            $table->boolean('masses_negative')->default(false); // i27
            $table->boolean('engorged_veins_positive')->default(false); // i28
            $table->boolean('engorged_veins_negative')->default(false); // i29
            $table->string('duration')->nullable(); // i30
            $table->string('cause')->nullable(); // i31
            $table->string('nose')->nullable(); // i32
            $table->string('nasopharynx')->nullable(); // i33
            $table->string('oral_cavity')->nullable(); // i34
            $table->string('larynx')->nullable(); // i35
            $table->string('endoscopy')->nullable(); // i36
            $table->string('radiology')->nullable(); // i37


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_number');
    }
};
