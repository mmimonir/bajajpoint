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
        Schema::create('purchages', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('dealer_code')->nullable();
            $table->smallInteger('challan_no')->nullable();
            $table->string('factory_challan_no')->nullable();
            $table->date('purchage_date')->nullable();
            $table->string('vendor')->nullable();
            $table->double('purchage_value')->nullable();
            $table->string('dealer_name')->nullable();
            $table->smallInteger('quantity')->nullable();
            $table->string('gate_pass')->nullable();
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
        Schema::dropIfExists('purchages');
    }
};
