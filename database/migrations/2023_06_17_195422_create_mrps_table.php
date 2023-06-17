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
        Schema::create('mrps', function (Blueprint $table) {
            $table->integer('id', true);
            $table->double('model_code')->nullable();
            $table->string('model_name')->nullable();
            $table->double('mrp')->nullable();
            $table->double('vat_mrp')->nullable();
            $table->double('basic_vat')->nullable();
            $table->double('sale_vat')->nullable();
            $table->double('commission')->nullable();
            $table->decimal('tr', 10, 0)->nullable();
            $table->decimal('purchage_price', 10, 0)->nullable();
            $table->double('rebate_basic')->nullable();
            $table->double('rebate')->nullable();
            $table->integer('qty')->nullable();
            $table->double('amount')->nullable();
            $table->double('vat_purchage_mrp')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('mrps');
    }
};
