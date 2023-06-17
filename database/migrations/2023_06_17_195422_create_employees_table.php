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
        Schema::create('employees', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 100)->nullable();
            $table->string('mobile')->nullable()->unique('mobile');
            $table->unsignedInteger('roles_id')->nullable();
            $table->string('education')->nullable();
            $table->string('permanent_address', 100)->nullable();
            $table->string('present_address', 100)->nullable();
            $table->string('gardian_name', 100)->nullable();
            $table->string('gardian_mobile', 50)->nullable();
            $table->date('joining_date')->nullable();
            $table->string('nid_no', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->integer('salary')->nullable();
            $table->string('web_site', 50)->nullable();
            $table->string('facebook', 50)->nullable();
            $table->string('twitter', 50)->nullable();
            $table->string('instagram', 50)->nullable();
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
        Schema::dropIfExists('employees');
    }
};
