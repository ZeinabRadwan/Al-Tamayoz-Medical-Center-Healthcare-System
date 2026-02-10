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
        Schema::table('dysphagia_assessment', function (Blueprint $table) {
            $table->boolean('i123')->default(false);
            $table->text('i122')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dysphagia_assessment', function (Blueprint $table) {
            $table->dropColumn('i123');
            $table->dropColumn('i122');
        });
    }
};
