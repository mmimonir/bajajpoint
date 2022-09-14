<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);
Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'admin']], function () {
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
        Route::post('/send_sms',  'send_sms')->name('sms.send_sms');
    });
    Route::controller(App\Http\Controllers\DashboardController::class)->group(function () {
        Route::post('/rg_number_update',  'rg_number_update')->name('dashboard.rg_number_update');
    });
    Route::controller(App\Http\Controllers\BankAccountController::class)->group(function () {
        Route::get('/bank_index_page',  'bank_index_page')->name('bank.index_page');
        Route::get('/get_bank_account',  'get_bank_account')->name('bank.get_bank_account');
        Route::post('/get_single_bank_account',  'get_single_bank_account')->name('bank.get_single_bank_account');
        Route::post('/store_bank_account',  'store_bank_account')->name('bank.store_bank_account');
        Route::post('/update_bank_account',  'update_bank_account')->name('bank.update_bank_account');
        Route::delete('/delete_bank_account',  'delete_bank_account')->name('bank.delete_bank_account');
    });
    Route::controller(App\Http\Controllers\HTMLPrintController::class)->group(function () {
        Route::get('/full_hform/{id}',  'full_hform')->name('print.full_hform');
        Route::get('/full_hform_get_data',  'full_hform_get_data')->name('print.get_data');
    });
    Route::controller(App\Http\Controllers\ShowroomController::class)->group(function () {
        Route::get('/current_stock_init',  'current_stock_init')->name('showroom.current_stock_init');
        Route::get('/current_stock',  'current_stock')->name('showroom.current_stock');
    });
    Route::controller(App\Http\Controllers\EmployeeAttendanceController::class)->group(function () {
        Route::get('/attendance_init',  'attendance_init')->name('employee.attendance');
    });
    Route::controller(App\Http\Controllers\RoleController::class)->group(function () {
        Route::get('/get_all_roles',  'get_all_roles')->name('role.get_all_roles');
    });
    Route::controller(App\Http\Controllers\AttendanceController::class)->group(function () {
        Route::post('/get_attendance_by_empid',  'get_attendance_by_empid')->name('attendance.attendance_by_id');
        Route::post('/daily_attendance_store',  'daily_attendance_store')->name('attendance.daily_attendance_store');
        Route::post('/salary_calculate',  'salary_calculate')->name('attendance.salary_calculate');
        Route::post('/timestamp_create_or_update',  'timestamp_create_or_update')->name('attendance.timestamps');
        Route::post('/attendance_timestamp_get',  'attendance_timestamp_get')->name('attendance.timestamps_get');
    });
    Route::controller(App\Http\Controllers\VATPurchageAccountController::class)->group(function () {
        Route::get('/vat_purchage_homepage',  'vat_purchage_homepage')->name('vat.vat_purchage_homepage');
    });
});


Auth::routes(['register' => false]);
// Auth::routes();
