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
        Schema::create('quotation_items', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('quotation_id')->nullable();
            $table->string('tb_sl')->nullable();
            $table->string('tb_description')->nullable();
            $table->string('tb_unit')->nullable();
            $table->string('tb_unit_price')->nullable();
            $table->string('tb_grand_total')->nullable();
            $table->string('tb_total')->nullable();
            $table->string('tb_less_discount')->nullable();
            $table->string('tb_grand_total_after_less')->nullable();
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
        Schema::dropIfExists('quotation_items');
    }
};
