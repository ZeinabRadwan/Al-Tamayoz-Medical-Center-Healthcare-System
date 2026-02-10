<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::table('patients', function (Blueprint $table) {
        $table->string('gender')->nullable();
        $table->string('how_did_you_find_out_about_us')->nullable();
    });
}

public function down()
{
    Schema::table('patients', function (Blueprint $table) {
        $table->dropColumn('gender');
        $table->dropColumn('how_did_you_find_out_about_us');
    });
}

};
