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
        Schema::create('spare_parts_sales', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('part_id')->nullable();
            $table->integer('job_card_id')->nullable();
            $table->integer('job_card_no')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('bill_id')->nullable();
            $table->integer('bill_no')->nullable();
            $table->string('request_from', 50)->nullable();
            $table->integer('sale_rate')->nullable();
            $table->integer('quantity')->nullable();
            $table->date('sale_date')->nullable();
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
        Schema::dropIfExists('spare_parts_sales');
    }
};
