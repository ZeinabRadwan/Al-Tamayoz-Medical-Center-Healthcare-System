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
        Schema::table('adults_physiotherapy_assessment', function (Blueprint $table) {
            $table->text('history_of_trauma_illness_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('adults_physiotherapy_assessment', function (Blueprint $table) {
            $table->date('history_of_trauma_illness_date')->nullable()->change();
        });
    }
};
