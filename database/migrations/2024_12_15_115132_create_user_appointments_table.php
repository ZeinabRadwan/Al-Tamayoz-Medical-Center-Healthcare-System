<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('user_appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clinic_appointment_id')->constrained('clinic_appointments')->onDelete('cascade');
            $table->string('name');
            $table->string('id_number');
            $table->string('phone');
            $table->string('nationality');
            $table->date('dob');
            $table->string('gender');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_appointments');
    }
}
