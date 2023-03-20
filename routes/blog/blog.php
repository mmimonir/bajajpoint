<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'prefix' => 'blog'], function () {
    Route::controller(App\Http\Controllers\Blog\BlogDashboardController::class)->group(function () {
        Route::get('/blog_dashboard', 'index')->name('blog.dashboard');
    });
});
