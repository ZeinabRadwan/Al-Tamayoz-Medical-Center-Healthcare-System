<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')
                ->references('id')
                ->on('patients')
                ->onDelete('cascade');
            $table->string('name')->nullable();
            $table->integer('age')->nullable();
            $table->text('symptoms')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('medical_report')->nullable();
            $table->string('medical_leave')->nullable();
            $table->string('blood_pressure')->nullable();

            $table->float('height')->nullable();
            $table->float('weight')->nullable();
            $table->float('spo2')->nullable();
            $table->float('rr')->nullable();
            $table->float('hr')->nullable();
            $table->float('bp')->nullable();
            $table->float('pube')->nullable();
            $table->float('temp')->nullable();
            $table->string('diagnosis')->nullable();
            $table->text('medication')->nullable();
            $table->text('treatment_plan')->nullable();
            $table->unsignedBigInteger('insurance_id')->nullable();
            $table->foreign('insurance_id')
                ->references('id')
                ->on('insurance_providers')
                ->onDelete('cascade')
                ->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
