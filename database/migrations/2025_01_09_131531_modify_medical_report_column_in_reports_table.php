<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyMedicalReportColumnInReportsTable extends Migration
{
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->text('medical_report')->change(); // Change column type to TEXT
        });
    }

    public function down()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->string('medical_report', 255)->change(); // Revert to original type if needed
        });
    }
}
