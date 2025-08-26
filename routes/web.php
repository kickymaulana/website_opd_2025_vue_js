<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\wpadmin\LoginController;
use App\Http\Controllers\wpadmin\DashboardController;

Route::get('/', function () {
    return Inertia::render('HelloWorld');
});

Route::get('wp-admin/login', [LoginController::class, 'login'])->name('login');
Route::post('wp-admin/login', [LoginController::class, 'submit'])->name('login');
Route::delete('wp-admin/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/wp-admin', [DashboardController::class, 'index'])->name('wpadmin.dashboard')->middleware('auth');
