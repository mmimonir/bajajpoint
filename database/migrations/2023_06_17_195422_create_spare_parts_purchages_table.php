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
        Schema::create('spare_parts_purchages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parts_purchage_invoices_id')->nullable();
            $table->string('purchage_bill_no', 50)->nullable();
            $table->date('purchage_date')->nullable();
            $table->string('part_id', 50)->nullable();
            $table->unsignedMediumInteger('rate')->nullable();
            $table->unsignedSmallInteger('quantity')->nullable();
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
        Schema::dropIfExists('spare_parts_purchages');
    }
};
