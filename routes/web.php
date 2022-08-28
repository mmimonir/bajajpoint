<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);
Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::controller(App\Http\Controllers\BusinessProfileController::class)->group(function () {
        Route::get('/profile_index',  'index')->name('profile.index');
        Route::post('/add_new_profile',  'add_new_profile')->name('profile.add');
        Route::post('/get_single_profile',  'get_single_profile')->name('profile.get_single_profile');
        Route::post('/update_profile',  'update_profile')->name('profile.update');
        Route::delete('/delete_profile',  'delete_profile')->name('profile.delete');
        Route::get('/get_profile',  'get_profile')->name('profile.get');
    });
    Route::controller(App\Http\Controllers\SMSController::class)->group(function () {
        Route::get('/sms_index',  'index')->name('sms.index');
    });
});


Auth::routes(['register' => false]);
// Auth::routes();
