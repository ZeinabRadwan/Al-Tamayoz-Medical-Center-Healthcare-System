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
    Schema::table('follow_up_reports', function (Blueprint $table) {
        $table->timestamp('current_day')->change();
    });
}

public function down()
{
    Schema::table('follow_up_reports', function (Blueprint $table) {
        $table->date('current_day')->change();
    });
}

};
