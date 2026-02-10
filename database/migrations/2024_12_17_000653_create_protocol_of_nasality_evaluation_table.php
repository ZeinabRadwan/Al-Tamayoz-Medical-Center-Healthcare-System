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
        Schema::create('protocol_of_nasality_evaluation', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');

            $table->string('i1')->nullable();
            $table->string('i2')->nullable();
            $table->string('i3')->nullable();
            $table->string('i4')->nullable();
            $table->string('i5')->nullable();
            $table->boolean('i6')->default(false);
            $table->boolean('i7')->default(false);
            $table->string('i8')->nullable();
            $table->string('i9')->nullable();
            $table->string('i10')->nullable();
            $table->string('i11')->nullable();
            $table->string('i12')->nullable();
            $table->string('i13')->nullable();
            $table->string('i14')->nullable();
            $table->boolean('i15')->default(false);
            $table->boolean('i16')->default(false);
            $table->string('i17')->nullable();
            $table->string('i18')->nullable();
            $table->string('i19')->nullable();
            $table->string('i20')->nullable();
            $table->boolean('i21')->default(false);
            $table->boolean('i22')->default(false);
            $table->string('i23')->nullable();
            $table->boolean('i24')->default(false);
            $table->boolean('i25')->default(false);
            $table->boolean('i26')->default(false);
            $table->string('i27')->nullable();
            $table->boolean('i28')->default(false);
            $table->boolean('i29')->default(false);
            $table->boolean('i30')->default(false);
            $table->boolean('i31')->default(false);
            $table->boolean('i32')->default(false);
            $table->string('i33')->nullable();
            $table->string('i34')->nullable();
            $table->string('i35')->nullable();
            $table->string('i36')->nullable();
            $table->string('i37')->nullable();
            $table->string('i38')->nullable();
            $table->string('i39')->nullable();
            $table->string('i40')->nullable();
            $table->string('i41')->nullable();
            $table->string('i42')->nullable();
            $table->string('i43')->nullable();
            $table->string('i44')->nullable();
            $table->string('i45')->nullable();
            $table->string('i46')->nullable();
            $table->string('i47')->nullable();
            $table->string('i48')->nullable();
            $table->string('i49')->nullable();
            $table->string('i50')->nullable();
            $table->string('i51')->nullable();
            $table->string('i52')->nullable();
            $table->string('i53')->nullable();
            $table->string('i54')->nullable();
            $table->string('i55')->nullable();
            $table->string('i56')->nullable();
            $table->string('i57')->nullable();
            $table->string('i58')->nullable();
            $table->string('i59')->nullable();
            $table->string('i60')->nullable();
            $table->boolean('i61')->default(false);
            $table->boolean('i62')->default(false);
            $table->string('i63')->nullable();
            $table->string('i64')->nullable();
            $table->string('i65')->nullable();
            $table->string('i66')->nullable();
            $table->string('i67')->nullable();
            $table->string('i68')->nullable();
            $table->string('i69')->nullable();
            $table->string('i70')->nullable();
            $table->string('i71')->nullable();
            $table->string('i72')->nullable();
            $table->string('i73')->nullable();
            $table->string('i74')->nullable();
            $table->string('i75')->nullable();
            $table->string('i76')->nullable();
            $table->boolean('i77')->default(false);
            $table->boolean('i78')->default(false);
            $table->boolean('i79')->default(false);
            $table->boolean('i80')->default(false);
            $table->boolean('i81')->default(false);
            $table->boolean('i82')->default(false);
            $table->boolean('i83')->default(false);
            $table->boolean('i84')->default(false);
            $table->string('i85')->nullable();
            $table->string('i86')->nullable();
            $table->string('i87')->nullable();
            $table->string('i88')->nullable();
            $table->boolean('i89')->default(false);
            $table->boolean('i90')->default(false);
            $table->boolean('i91')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nasality_evaluations');
    }
};
