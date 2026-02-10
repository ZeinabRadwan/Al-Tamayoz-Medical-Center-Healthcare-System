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
        Schema::table('fee_score_reports', function (Blueprint $table) {
            $table->boolean('pas_score_3_ml')->default(false);
            $table->boolean('pas_score_5_ml')->default(false);
            $table->boolean('pas_score_10_ml')->default(false);

            // thick_pas_score_3_ml
            $table->boolean('thick_pas_score_3_ml')->default(false);
            $table->boolean('thick_pas_score_5_ml')->default(false);
            $table->boolean('thick_pas_score_10_ml')->default(false);

            // semi_pas_score_3_ml
            $table->boolean('semi_pas_score_3_ml')->default(false);
            $table->boolean('semi_pas_score_5_ml')->default(false);
            $table->boolean('semi_pas_score_10_ml')->default(false);

            // solid_pas_score_3_ml
            $table->boolean('solid_pas_score_3_ml')->default(false);
            $table->boolean('solid_pas_score_5_ml')->default(false);
            $table->boolean('solid_pas_score_10_ml')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fee_score_reports', function (Blueprint $table) {
            $table->dropColumn('pas_score_3_ml');
            $table->dropColumn('pas_score_5_ml');
            $table->dropColumn('pas_score_10_ml');
            $table->dropColumn('thick_pas_score_3_ml');
            $table->dropColumn('thick_pas_score_5_ml');
            $table->dropColumn('thick_pas_score_10_ml');
            $table->dropColumn('semi_pas_score_3_ml');
            $table->dropColumn('semi_pas_score_5_ml');
            $table->dropColumn('semi_pas_score_10_ml');
            $table->dropColumn('solid_pas_score_3_ml');
            $table->dropColumn('solid_pas_score_5_ml');
            $table->dropColumn('solid_pas_score_10_ml');
        });
    }
};
