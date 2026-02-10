<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('protocol_for_voice_evaluation', function (Blueprint $table) {
            $table->boolean('i41')->default(false);
            $table->boolean('i42')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('protocol_for_voice_evaluation', function (Blueprint $table) {
            $table->dropColumn('i41');
            $table->dropColumn('i42');
        });
    }
};
