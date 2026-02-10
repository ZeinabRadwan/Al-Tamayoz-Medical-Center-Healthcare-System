<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('user_appointments', function (Blueprint $table) {
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending')->after('gender'); 
        });
    }

    public function down()
    {
        Schema::table('user_appointments', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
