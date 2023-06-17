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
        Schema::create('address_updates', function (Blueprint $table) {
            $table->integer('id')->nullable();
            $table->integer('address_code')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('address_Namen')->nullable();
            $table->string('address_one')->nullable();
            $table->string('address_two')->nullable();
            $table->string('mobile')->nullable();
            $table->string('sale_date', 40)->nullable();
            $table->string('ch_one')->nullable();
            $table->string('ch_two')->nullable();
            $table->string('ch_three')->nullable();
            $table->string('en_one')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_updates');
    }
};
