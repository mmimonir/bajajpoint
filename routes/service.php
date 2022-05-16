<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'prefix' => 'service'], function () {
    Route::controller(App\Http\Controllers\ServiceDashboardController::class)->group(function () {
        Route::get('/service_dashboard',  'index')->name('service.dashboard');
    });
});
