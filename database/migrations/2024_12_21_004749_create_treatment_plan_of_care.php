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
        Schema::create('treatment_plan_of_care', function (Blueprint $table) {
            $table->id();
            $table->json('problems_list')->nullable();
            $table->json('short_term_goals')->nullable();
            $table->json('long_term_goals')->nullable();

            $table->json('problems_list_6')->nullable();
            $table->json('short_term_goals_6')->nullable();
            $table->json('long_term_goals_6')->nullable();

            $table->json('problems_list_12')->nullable();
            $table->json('short_term_goals_12')->nullable();
            $table->json('long_term_goals_12')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatment_plan_of_care');
    }
};
