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
        Schema::create('money_receipts', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('core_id')->nullable();
            $table->integer('receipt_no')->nullable();
            $table->date('receipt_date')->nullable();
            $table->string('client_name', 100)->nullable();
            $table->string('client_mobile', 50)->nullable();
            $table->string('payment_method', 100)->nullable();
            $table->date('cheque_date')->nullable();
            $table->string('drawn_on', 100)->nullable();
            $table->string('on_account_of', 100)->nullable();
            $table->string('amount', 100)->nullable();
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
        Schema::dropIfExists('money_receipts');
    }
};
