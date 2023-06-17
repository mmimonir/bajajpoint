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
        Schema::create('cores', function (Blueprint $table) {
            $table->integer('id', true);
            $table->double('sl')->nullable();
            $table->string('vendor_name')->nullable();
            $table->integer('challan_no')->nullable();
            $table->string('factory_challan_no')->nullable();
            $table->date('purchage_date')->nullable();
            $table->integer('vat_code')->nullable();
            $table->integer('print_code')->nullable();
            $table->integer('report_code')->nullable();
            $table->integer('model_code')->nullable();
            $table->string('model')->nullable();
            $table->string('ckd_process')->nullable();
            $table->integer('approval_no')->nullable();
            $table->integer('invoice_no')->nullable();
            $table->double('unit_price')->nullable();
            $table->double('commission')->nullable();
            $table->decimal('tr_amount', 10, 0)->nullable();
            $table->decimal('purchage_price', 10, 0)->nullable();
            $table->double('sale_price')->nullable();
            $table->double('unit_price_vat')->nullable();
            $table->double('basic_price_vat')->nullable();
            $table->decimal('sale_vat', 10, 0)->nullable();
            $table->double('rebate_basic')->nullable();
            $table->decimal('rebate', 10, 0)->nullable();
            $table->integer('uml_mushak_no')->nullable();
            $table->date('mushak_date')->nullable();
            $table->string('whos_vat')->nullable();
            $table->string('vat_process')->nullable();
            $table->date('tr_dep_date')->nullable();
            $table->integer('sale_mushak_no')->nullable();
            $table->string('gate_pass')->nullable();
            $table->string('eight_chassis')->nullable();
            $table->string('one_chassis')->nullable();
            $table->string('three_chassis')->nullable();
            $table->string('five_chassis')->nullable();
            $table->string('chassis_no', 243)->nullable();
            $table->string('six_engine')->nullable();
            $table->string('five_engine')->nullable();
            $table->string('engine_no', 243)->nullable();
            $table->integer('color_code')->nullable();
            $table->string('color')->nullable();
            $table->date('original_sale_date')->nullable();
            $table->date('sale_date')->nullable();
            $table->date('print_date')->nullable();
            $table->date('vat_sale_date')->nullable();
            $table->string('dealer')->nullable();
            $table->string('coupon')->nullable();
            $table->integer('coupon_no')->nullable();
            $table->double('coupon_amount')->nullable();
            $table->string('rg_number')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('relation')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('address_one')->nullable();
            $table->string('address_two')->nullable();
            $table->string('full_address', 243)->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->date('dob')->nullable();
            $table->string('nid_no')->nullable();
            $table->string('nationality')->nullable();
            $table->string('gender')->nullable();
            $table->double('register_no')->nullable();
            $table->double('page_no')->nullable();
            $table->integer('rg_duration')->nullable();
            $table->double('rg_amount')->nullable();
            $table->string('name_change_detail')->nullable();
            $table->date('change_date')->nullable();
            $table->integer('extra_sale')->nullable();
            $table->string('combine')->nullable();
            $table->string('combine_code', 243)->nullable();
            $table->integer('vat_purchage_sl')->nullable();
            $table->integer('vat_sale_sl')->nullable();
            $table->integer('year_of_manufacture')->nullable();
            $table->string('print_ref')->nullable();
            $table->string('ckd_folder')->nullable();
            $table->integer('vat_year_purchage')->nullable();
            $table->integer('vat_year_sale')->nullable();
            $table->integer('stage')->nullable();
            $table->integer('store_id')->nullable();
            $table->double('lifting_bonus')->nullable();
            $table->string('evl_invoice_no')->nullable();
            $table->string('file_status')->nullable();
            $table->date('dealer_out_date')->nullable();
            $table->date('time_stamp')->nullable();
            $table->string('tr_month_code')->nullable();
            $table->integer('tr_number')->nullable();
            $table->date('tr_deposite_date')->nullable();
            $table->string('vat_month_purchage')->nullable();
            $table->string('vat_month_sale')->nullable();
            $table->integer('address_code')->nullable();
            $table->string('rg_status')->nullable();
            $table->string('note')->nullable();
            $table->string('is_rebate')->nullable();
            $table->double('vat_purchage_mrp')->nullable();
            $table->decimal('vat_rebate', 10, 0)->nullable();
            $table->date('fake_sale_date')->nullable();
            $table->string('_token')->nullable();
            $table->timestamps();
            $table->integer('price_declare_id')->nullable();
            $table->decimal('sale_profit', 10, 0)->nullable();
            $table->string('in_stock')->nullable();
            $table->string('mc_location')->nullable();
            $table->integer('name_change_fee')->nullable();
            $table->date('name_change_date')->nullable();
            $table->string('name_change_note')->nullable();
            $table->integer('delivery_challan_no')->nullable();
            $table->integer('receipt_id')->nullable();
            $table->integer('chassis_convert')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cores');
    }
};
