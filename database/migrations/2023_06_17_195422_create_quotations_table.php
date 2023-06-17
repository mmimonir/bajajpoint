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
        Schema::create('quotations', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('ref')->nullable();
            $table->string('qt_date', 40)->nullable();
            $table->string('to')->nullable();
            $table->string('address_one')->nullable();
            $table->string('address_two')->nullable();
            $table->string('account')->nullable();
            $table->string('subject')->nullable();
            $table->string('body_text')->nullable();
            $table->string('tb_sl')->nullable();
            $table->string('tb_description')->nullable();
            $table->string('tb_unit')->nullable();
            $table->string('tb_unit_price')->nullable();
            $table->string('tb_grand_total')->nullable();
            $table->string('tb_total')->nullable();
            $table->string('tb_less_discount')->nullable();
            $table->string('tb_grand_total_after_less')->nullable();
            $table->string('discount')->nullable();
            $table->string('in_words')->nullable();
            $table->string('validity', 50)->nullable();
            $table->string('delivery')->nullable();
            $table->string('notes')->nullable();
            $table->string('payment')->nullable();
            $table->string('footer_text')->nullable();
            $table->string('for')->nullable();
            $table->string('free_offer')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotations');
    }
};
