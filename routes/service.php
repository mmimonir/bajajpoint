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
    });

    Route::controller(App\Http\Controllers\Service\ServiceBillController::class)->group(function () {
        Route::get('/create_bill',  'create_bill')->name('service.create_bill');
    });
});
