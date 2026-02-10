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
    Schema::table('billings', function (Blueprint $table) {
        $table->unsignedBigInteger('doctor_id3')->nullable()->after('doctor_id2');
        $table->unsignedBigInteger('doctor_id4')->nullable()->after('doctor_id3');
    });
}


    /**
     * Reverse the migrations.
     */
public function down()
{
    Schema::table('billings', function (Blueprint $table) {
        $table->dropColumn(['doctor_id3', 'doctor_id4']);
    });
}

};
