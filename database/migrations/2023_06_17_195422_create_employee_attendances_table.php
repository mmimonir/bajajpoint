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
        Schema::create('employee_attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('emp_id')->nullable();
            $table->dateTime('month')->nullable();
            $table->string('one', 1)->nullable();
            $table->string('two', 1)->nullable();
            $table->string('three', 1)->nullable();
            $table->string('four', 1)->nullable();
            $table->string('five', 1)->nullable();
            $table->string('six', 1)->nullable();
            $table->string('seven', 1)->nullable();
            $table->string('eight', 1)->nullable();
            $table->string('nine', 1)->nullable();
            $table->string('ten', 1)->nullable();
            $table->string('eleven', 1)->nullable();
            $table->string('twelve', 1)->nullable();
            $table->string('thirteen', 1)->nullable();
            $table->string('fourteen', 1)->nullable();
            $table->string('fifteen', 1)->nullable();
            $table->string('sixteen', 1)->nullable();
            $table->string('seventeen', 1)->nullable();
            $table->string('eighteen', 1)->nullable();
            $table->string('nineteen', 1)->nullable();
            $table->string('twenty', 1)->nullable();
            $table->string('twentyone', 1)->nullable();
            $table->string('twentytwo', 1)->nullable();
            $table->string('twentythree', 1)->nullable();
            $table->string('twentyfour', 1)->nullable();
            $table->string('twentyfive', 1)->nullable();
            $table->string('twentysix', 1)->nullable();
            $table->string('twentyseven', 1)->nullable();
            $table->string('twentyeight', 1)->nullable();
            $table->string('twentynine', 1)->nullable();
            $table->string('thirty', 1)->nullable();
            $table->string('thirtyone', 1)->nullable();
            $table->unsignedSmallInteger('advance')->nullable();
            $table->unsignedSmallInteger('absent_deduction')->nullable();
            $table->unsignedSmallInteger('total_payable')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->nullable()->default(0);
            $table->integer('updated_by')->nullable()->default(0);
            $table->integer('deleted_by')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_attendances');
    }
};
