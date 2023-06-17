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
        Schema::create('job_cards', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('customer_id')->nullable();
            $table->integer('bill_id')->nullable();
            $table->integer('service_engineer_id')->nullable();
            $table->integer('mechanic_id')->nullable();
            $table->integer('job_card_no');
            $table->date('job_card_date');
            $table->string('rg_number', 50)->nullable();
            $table->string('model_code', 100)->nullable();
            $table->date('mc_sale_date')->nullable();
            $table->integer('mileage')->nullable();
            $table->string('chassis_no', 50)->nullable();
            $table->string('engine_no', 50)->nullable();
            $table->string('our_customer', 50)->nullable();
            $table->string('service_type', 20)->nullable();
            $table->string('work_type', 50)->nullable();
            $table->string('customer_complain', 100)->nullable();
            $table->string('repair_description', 100)->nullable();
            $table->string('next_work_description', 100)->nullable();
            $table->date('next_work_date')->nullable();
            $table->string('amount_of_fuel', 50)->nullable();
            $table->string('any_scratch_in_tank', 20)->nullable();
            $table->string('indicator_is_broken', 20)->nullable();
            $table->string('any_scratch_in_headlight', 20)->nullable();
            $table->string('stuff_behavior', 20)->nullable();
            $table->string('service_center_is_clean', 20)->nullable();
            $table->string('garir_sompadito_kaj', 20)->nullable();
            $table->string('mc_problem_solved', 20)->nullable();
            $table->string('mc_delivery_done', 20)->nullable();
            $table->string('recomend_our_service_center', 50)->nullable();
            $table->string('customer_suggestion', 50)->nullable();
            $table->string('completed_last_service_type', 20)->nullable();
            $table->integer('paid_service_charge')->nullable();
            $table->integer('vat')->nullable();
            $table->integer('advance')->nullable();
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
        Schema::dropIfExists('job_cards');
    }
};
