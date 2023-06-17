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
        Schema::create('bills', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('service_customer_id')->nullable();
            $table->integer('job_card_id')->nullable();
            $table->integer('bill_no')->nullable();
            $table->date('bill_date')->nullable();
            $table->integer('bill_amount')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('profit')->nullable();
            $table->integer('due_amount')->nullable();
            $table->date('due_paid_date')->nullable();
            $table->integer('rest_due_amount')->nullable();
            $table->integer('vat')->nullable();
            $table->string('request_from', 50)->nullable();
            $table->string('client_name', 100)->nullable();
            $table->string('client_address', 500)->nullable();
            $table->string('client_mobile', 50)->nullable();
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
        Schema::dropIfExists('bills');
    }
};
