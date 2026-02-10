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
        Schema::create('fee_score_reports', function (Blueprint $table) {
            $table->id();
            $table->boolean('velopharyngeal_closure_complete')->default(false); // checkbox
            $table->boolean('velopharyngeal_closure_incomplete')->default(false); // checkbox
            $table->boolean('anatomy_normal')->default(false); // checkbox
            $table->string('anatomy_text')->nullable(); // text input
            $table->boolean('anatomy_pathology')->default(false); // checkbox
            $table->string('anatomy_pathology_text')->nullable(); // text input
            $table->boolean('secretions_no_excess')->default(false); // checkbox
            $table->boolean('secretions_pooled_valleculae')->default(false); // checkbox
            $table->boolean('secretions_pooled_laryngeal_vestibule')->default(false); // checkbox
            $table->boolean('secretions_aspirated')->default(false); // checkbox
            $table->boolean('secretions_patient_ejects')->default(false); // checkbox
            $table->boolean('secretions_no_response')->default(false); // checkbox
            $table->string('respiratory_rate')->nullable(); // text input
            $table->boolean('laryngeal_movements_normal')->default(false); // checkbox
            $table->boolean('laryngeal_movements_labored')->default(false); // checkbox
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_score_reports');
    }
};
