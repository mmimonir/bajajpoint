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
        Schema::create('color_codes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('combine')->nullable();
            $table->double('color_code')->nullable();
            $table->double('model_code')->nullable();
            $table->string('model_name')->nullable();
            $table->string('color')->nullable();
            $table->string('description')->nullable();
            $table->string('_token')->nullable();
            $table->string('created_at', 40)->nullable();
            $table->string('updated_at', 40)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('color_codes');
    }
};
