<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dms_service', function () {
        return 'This is serive routes.';
    });
});
