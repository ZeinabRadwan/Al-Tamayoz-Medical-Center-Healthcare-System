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
        Schema::create('zacat_form', function (Blueprint $table) {
            $table->id();
            $table->string('tax_number');
            $table->string('address');
            $table->string('email');
            $table->string('organization_name');
            $table->string('unit_name');
            $table->string('commercial_num');
            $table->string('build_num');
            $table->string('additional_num');
            $table->string('subdivision');
            $table->string('zip');
            $table->string('city_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('zacat_form');
    }
};
