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
        Schema::table('billings', function (Blueprint $table) {
            $table->text('qr')->nullable();
            $table->text('hash')->nullable();
            $table->json('zatca_errors')->nullable();
            $table->tinyInteger('zatca_status')->default(0);
            $table->tinyInteger('type_tax')->nullable()->default(0);
            $table->unsignedSmallInteger('type_code')->nullable()->default(388);
            $table->uuid('uuid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('billings', function (Blueprint $table) {
            $table->dropColumn(['qr', 'hash','zatca_errors', 'zatca_status', 'type_tax', 'type_code', 'uuid']);
        });
    }
};
