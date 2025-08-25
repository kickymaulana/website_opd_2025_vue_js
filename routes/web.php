<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('HelloWorld');
});

Route::get('wp-admin/login')->name('login');
