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
        Schema::create('service_customers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('client_name')->nullable();
            $table->string('client_mobile')->nullable()->unique('mobile');
            $table->string('client_email')->nullable();
            $table->string('client_address')->nullable();
            $table->string('completed_last_service_type')->nullable();
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
        Schema::dropIfExists('service_customers');
    }
};
