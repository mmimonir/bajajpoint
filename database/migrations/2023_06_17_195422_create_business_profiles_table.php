<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('business_code')->nullable()->unique('business_code');
            $table->string('name', 50)->nullable();
            $table->string('bin_number', 50)->nullable();
            $table->string('bin_address', 250)->nullable();
            $table->string('email', 250)->nullable();
            $table->string('mobile_sale', 250)->nullable();
            $table->string('mobile_parts', 250)->nullable();
            $table->string('mobile_rg', 250)->nullable();
            $table->string('mobile_office', 250)->nullable();
            $table->string('postal_address', 250)->nullable();
            $table->string('web_site', 50)->nullable();
            $table->timestamps();
            $table->string('_token', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_profiles');
    }
};
