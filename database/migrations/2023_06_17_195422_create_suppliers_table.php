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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('supplier_name')->nullable();
            $table->double('supplier_code')->nullable();
            $table->string('print_ref')->nullable();
            $table->integer('year_of_manufacture')->nullable();
            $table->integer('vat_year_purchage')->nullable();
            $table->integer('vat_year_sale')->nullable();
            $table->string('status')->nullable();
            $table->string('dealer_name')->nullable();
            $table->string('_token')->nullable();
            $table->string('created_at')->nullable();
            $table->string('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
};
