<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPatientIdToTreatmentPlanOfCareTable extends Migration
{
    public function up()
    {
        Schema::table('treatment_plan_of_care', function (Blueprint $table) {
            $table->unsignedBigInteger('patient_id')->nullable(); // Add nullable if existing data is present
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('treatment_plan_of_care', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);
            $table->dropColumn('patient_id');
        });
    }
}
