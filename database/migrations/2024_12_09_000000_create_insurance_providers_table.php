<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsuranceProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_providers', function (Blueprint  $table) {
             $table->id();  // Auto-incrementing primary key for the table
             $table->string('name');  // Name of the insurance provider (e.g., "Aetna", "Blue Cross")
             $table->string('contact_email')->nullable();  // Email for contacting the insurance provider
             $table->string('phone_number')->nullable();  // Phone number for contacting the provider
             $table->string('website_url')->nullable();  // Optional field for the provider's website
             $table->text('address')->nullable();  // Address of the insurance provider
             $table->timestamps();  // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insurance_providers');  // Drop the table if the migration is rolled back
    }
}
