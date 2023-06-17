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
        Schema::create('parts_purchage_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('supplier_id')->nullable();
            $table->string('purchage_bill_no', 50)->nullable();
            $table->date('purchage_date')->nullable();
            $table->unsignedMediumInteger('grand_total')->nullable();
            $table->unsignedMediumInteger('discount')->nullable();
            $table->unsignedInteger('net_purchage_amount')->nullable();
            $table->unsignedInteger('dealer_id')->nullable();
            $table->string('_token', 150)->nullable();
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
        Schema::dropIfExists('parts_purchage_invoices');
    }
};
