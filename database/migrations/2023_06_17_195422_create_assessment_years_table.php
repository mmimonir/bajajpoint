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
        Schema::create('assessment_years', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('vat_year_purchage', 50)->nullable();
            $table->string('vat_year_sale', 50)->nullable();
            $table->string('year_of_manufacture', 50)->nullable();
            $table->string('print_ref')->nullable();
            $table->string('vat_month_sale', 50)->nullable();
            $table->string('vat_month_purchage', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assessment_years');
    }
};
