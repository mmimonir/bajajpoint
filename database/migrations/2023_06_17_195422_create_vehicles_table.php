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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('model_code')->nullable();
            $table->string('model_name')->nullable();
            $table->string('model')->nullable();
            $table->string('model_make_of_vehicle')->nullable();
            $table->string('class_of_vehicle')->nullable();
            $table->string('no_of_cylinder_with_cc')->nullable();
            $table->string('size_of_tyre')->nullable();
            $table->string('type_of_body')->nullable();
            $table->string('horse_power')->nullable();
            $table->string('ladan_weight')->nullable();
            $table->string('unladen_weight')->nullable();
            $table->string('wheel_base')->nullable();
            $table->string('seating_capacity')->nullable();
            $table->string('makers_name')->nullable();
            $table->string('makers_country')->nullable();
            $table->string('cubic_capacity')->nullable();
            $table->string('the_reg_auth')->nullable();
            $table->string('brta')->nullable();
            $table->string('no_of_cylinder')->nullable();
            $table->string('fuel_used')->nullable();
            $table->string('rpm')->nullable();
            $table->string('seats_inc_driver')->nullable();
            $table->string('description')->nullable();
            $table->string('status')->nullable();
            $table->string('chassis_eight_digit')->nullable();
            $table->string('_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
