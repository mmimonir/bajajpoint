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
        Schema::create('spare_parts_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('part_id')->nullable()->unique('part_id');
            $table->string('part_name')->nullable();
            $table->string('model_name')->nullable();
            $table->unsignedMediumInteger('rate')->nullable();
            $table->unsignedSmallInteger('stock_quantity')->nullable();
            $table->string('location')->nullable();
            $table->string('category')->nullable();
            $table->string('mobil_brand_name')->nullable();
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
        Schema::dropIfExists('spare_parts_stocks');
    }
};
