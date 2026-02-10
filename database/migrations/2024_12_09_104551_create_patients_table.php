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
        Schema::create('patients', function (Blueprint  $table) {
             $table->id();
             $table->string('name');
             $table->string('id_number')->unique();
             $table->date('dob');
             $table->integer('age');
             $table->string('address')->nullable();
             $table->text('symptoms')->nullable();
             $table->string('blood_type')->nullable();
             $table->string('nationality');
             $table->string('phone');
             $table->string('email')->unique()->nullable();
             $table->unsignedBigInteger('insurance_id')->nullable();
             $table->foreign('insurance_id')
              ->references('id')
              ->on('insurance_providers')
              ->onDelete('cascade')
              ->nullable();
             $table->foreignId('specialization_id')->constrained('medical_specializations')->nullable();
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
