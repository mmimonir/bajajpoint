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
    });
});
