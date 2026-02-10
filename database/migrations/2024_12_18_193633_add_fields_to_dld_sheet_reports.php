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
        Schema::table('dld_sheet_reports', function (Blueprint $table) {
            $table->boolean('i1')->default(false);
            $table->boolean('i2')->default(false);
            $table->boolean('i3')->default(false);
            $table->boolean('i4')->default(false);
            $table->boolean('i5')->default(false);
            $table->boolean('i6')->default(false);
            $table->boolean('i7')->default(false);
            $table->boolean('i8')->default(false);
            $table->boolean('i9')->default(false);
            $table->boolean('i10')->default(false);
            $table->boolean('i11')->default(false);
            $table->boolean('i12')->default(false);
            $table->boolean('i13')->default(false);
            $table->boolean('i14')->default(false);
            $table->boolean('i15')->default(false);
            $table->boolean('i16')->default(false);
            $table->boolean('i17')->default(false);
            $table->boolean('i18')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dld_sheet_reports', function (Blueprint $table) {
            //
        });
    }
};
