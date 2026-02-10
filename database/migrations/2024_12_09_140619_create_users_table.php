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
        Schema::create('users', function (Blueprint  $table) {
             $table->id();
             $table->string('name');
             $table->string('first_name')->nullable();
             $table->string('last_name')->nullable();
             $table->string('id_number')->unique()->nullable();
             $table->date('dob')->nullable();
             $table->integer('age')->nullable();
             $table->string('address')->nullable();
             $table->string('qualification')->nullable();
             $table->string('major')->nullable();
             $table->string('job_title')->nullable();
             $table->date('start_date')->nullable();
             $table->string('phone')->nullable();
             $table->decimal('salary_rate', 8, 2)->nullable();
             $table->string('email')->unique();
             $table->string('password');
             $table->foreignId('department_id')->nullable()->constrained('departments')->onDelete('cascade');
             $table->foreignId('clinic_id')->nullable()->constrained('clinics')->onDelete('cascade');
             $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
