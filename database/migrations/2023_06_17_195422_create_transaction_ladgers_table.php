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
        Schema::create('transaction_ladgers', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('trans_date')->nullable();
            $table->unsignedInteger('client_id')->nullable();
            $table->string('trans_description')->nullable();
            $table->enum('trans_type', ['debit', 'credit'])->nullable();
            $table->double('trans_amount')->unsigned()->nullable();
            $table->timestamps();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_ladgers');
    }
};
