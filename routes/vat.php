<?php

use Illuminate\Support\Facades\Route;

// Route::group(['middleware' => ['auth', 'admin']], function () {
//     Route::controller(App\Http\Controllers\VAT\VATPurchageAccountController::class)->group(function () {
//         Route::get('/vat_purchage_homepage',  'vat_purchage_homepage')->name('vat.vat_purchage_homepage');
//     });
// });
Route::group(['middleware' => ['web']], function () {
    Route::controller(App\Http\Controllers\VAT\VATPurchageAccountController::class)->group(function () {
        Route::post('/vat_purchage_homepage',  'vat_purchage_homepage')->name('vat.vat_purchage_homepage');
    });
});
