<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'prefix' => 'service'], function () {
    Route::controller(App\Http\Controllers\ServiceDashboardController::class)->group(function () {
        Route::get('/service_dashboard',  'index')->name('service.dashboard');
    });

    Route::controller(App\Http\Controllers\Service\JobCardController::class)->group(function () {
        Route::get('/job_card',  'load_job_card_view')->name('service.job_card');
        Route::post('/create_job_card',  'create_job_card')->name('job_card.create');
        Route::get('/load_basic_data',  'load_basic_data')->name('job_card.load_basic_data');
        Route::get('/search_by_part_id',  'search_by_part_id')->name('job_card.search_by_part_id');
        Route::get('/search_by_full_part_id',  'search_by_full_part_id')->name('job_card.search_by_full_part_id');
        Route::get('/assign_job_card_sl_no',  'assign_job_card_sl_no')->name('job_card.assign_job_card_sl_no');
        Route::get('/load_employee_data',  'load_employee_data')->name('job_card.load_employee_data');
        Route::get('/check_customer',  'customer_name_already_exists')->name('job_card.check_customer');
        // Create or update item on spare parts sale table based on job card id and jb date
        Route::get('/create_or_update',  'create_or_update')->name('job_card.create_or_update');
        Route::get('/delete_parts_item',  'delete_parts_item')->name('job_card.delete_parts_item');
        Route::get('/load_job_card_list',  'load_job_card_list')->name('job_card.load_job_card_list');
        Route::get('/load_single_job_card',  'load_single_job_card')->name('job_card.load_single_job_card');
        Route::post('/delivery_done',  'delivery_done')->name('job_card.delivery_done');
        // Route::post('/create_bill',  'delivery_done')->name('bill.create_bill');
        Route::get('/assign_bill_no',  'assign_bill_no')->name('bill.assign_bill_no');
    });

    Route::controller(App\Http\Controllers\Service\ServiceBillController::class)->group(function () {
        Route::get('/create_bill',  'create_bill')->name('bill.create_bill');
        Route::get('/load_bill_list',  'load_bill_list')->name('bill.bill_list');
        Route::post('/create_bill',  'store_bill')->name('bill.store_bill');
        Route::get('/load_single_bill',  'load_single_bill')->name('bill.load_single_bill');
        Route::get('/html_bill',  'html_bill')->name('bill.html_bill');
    });

    Route::controller(App\Http\Controllers\Service\ServiceCallController::class)->group(function () {
        Route::get('/service_call',  'service_call_list_view')->name('service.service_call');
        Route::post('/get_call_result',  'get_call_result')->name('service.get_call_result');
        Route::post('/save_service_note',  'save_service_note')->name('service.save_service_note');
    });

    // Mechanics Table
    Route::controller(App\Http\Controllers\Service\MechanicsController::class)->group(function () {
        Route::get('/mechanics_index',  'mechanics_index')->name('mechanics.index');
        Route::post('/get_single_mechanic',  'get_single_mechanic')->name('mechanics.get_single_mechanic');
        Route::get('/mechanics_get',  'mechanics_get')->name('mechanics.get');
        Route::post('/mechanics_add',  'mechanics_add')->name('mechanics.add');
        Route::post('/mechanics_update',  'mechanics_update')->name('mechanics.update');
        Route::delete('/mechanics_delete',  'mechanics_delete')->name('mechanics.delete');
    });
    Route::controller(App\Http\Controllers\Service\SparePartsPurchageController::class)->group(function () {
        Route::get('/index',  'index')->name('parts.index');
        Route::get('/load_invoice_list',  'load_invoice_list')->name('invoice.invoice_list');
        Route::post('/store_invoice',  'store_invoice')->name('invoice.store_invoice');
        Route::get('/load_single_invoice',  'load_single_invoice')->name('invoice.load_single_invoice');
        Route::get('/purchage_create_or_update',  'purchage_create_or_update')->name('invoice.create_or_update');
    });
});
