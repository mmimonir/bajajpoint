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
        Schema::create('price_declares', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedInteger('business_profile_id');
            $table->unsignedSmallInteger('model_code')->nullable();
            $table->string('hs_code')->nullable();
            $table->string('products_description')->nullable();
            $table->integer('tr')->nullable();
            $table->string('unit_of_supply')->nullable();
            $table->double('buy_price')->nullable();
            $table->string('percentage')->nullable();
            $table->double('value_addition_amount')->nullable();
            $table->double('vat_mrp')->nullable();
            $table->date('submit_date')->nullable();
            $table->string('purchage_mushak_no')->nullable();
            $table->date('mushak_date')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->string('_token', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_declares');
    }
};
