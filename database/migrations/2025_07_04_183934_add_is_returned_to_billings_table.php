<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::table('billings', function (Blueprint $table) {
        $table->unsignedBigInteger('returned_id')->nullable()->after('zatca_errors');
        $table->boolean('is_returned')->default(false)->after('zatca_errors');
    });
}

public function down()
{
    Schema::table('billings', function (Blueprint $table) {
        $table->dropColumn('returned_id');
        $table->dropColumn('is_returned');
    });
}

};
