<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\wpadmin\LoginController;

Route::get('/', function () {
    return Inertia::render('HelloWorld');
});

Route::get('wp-admin/login', [LoginController::class, 'login'])->name('login');
Route::post('wp-admin/login', [LoginController::class, 'submit'])->name('login');
