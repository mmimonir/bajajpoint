<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/service', function () {
        return view('service_dashboard');
    });
});
