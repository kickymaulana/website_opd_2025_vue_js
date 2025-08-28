<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\wpadmin\LoginController;
use App\Http\Controllers\wpadmin\DashboardController;
use App\Http\Controllers\wpadmin\TemaController;
use App\Http\Controllers\wpadmin\HiasanController;
use App\Http\Controllers\wpadmin\TipeController;
use App\Http\Controllers\wpadmin\SinglePageController;

Route::get('/', function () {
    return Inertia::render('HelloWorld');
});

Route::get('wp-admin/login', [LoginController::class, 'login'])->name('login');
Route::post('wp-admin/login', [LoginController::class, 'submit'])->name('login');
Route::delete('wp-admin/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/wp-admin', [DashboardController::class, 'index'])->name('wpadmin.dashboard')->middleware('auth');
Route::get('/wp-admin/tema/index', [TemaController::class, 'index'])->name('wpadmin.tema.index')->middleware('auth');
Route::get('/wp-admin/tema/create', [TemaController::class, 'create'])->name('wpadmin.tema.create')->middleware('auth');
Route::post('/wp-admin/tema/create', [TemaController::class, 'store'])->name('wpadmin.tema.store')->middleware('auth');
Route::get('/wp-admin/tema/{id}/show', [TemaController::class, 'show'])->name('wpadmin.tema.show')->middleware('auth');
Route::get('/wp-admin/tema/{id}/edit', [TemaController::class, 'edit'])->name('wpadmin.tema.edit')->middleware('auth');
Route::patch('/wp-admin/tema/{id}/edit', [TemaController::class, 'update'])->name('wpadmin.tema.edit')->middleware('auth');
Route::patch('/wp-admin/tema/{id}/aktifkan', [TemaController::class, 'aktifkan'])->name('wpadmin.tema.aktifkan')->middleware('auth');
Route::patch('/wp-admin/tema/{id}/nonaktifkan', [TemaController::class, 'nonaktifkan'])->name('wpadmin.tema.nonaktifkan')->middleware('auth');
Route::delete('/wp-admin/tema/{id}/hapus', [TemaController::class, 'hapus'])->name('wpadmin.tema.hapus')->middleware('auth');

Route::get('/wp-admin/hiasan/{tema_id}/index', [HiasanController::class, 'index'])->name('wpadmin.hiasan.index')->middleware('auth');
Route::get('/wp-admin/hiasan/{tema_id}/create', [HiasanController::class, 'create'])->name('wpadmin.hiasan.create')->middleware('auth');
Route::post('/wp-admin/hiasan/{tema_id}/create', [HiasanController::class, 'store'])->name('wpadmin.hiasan.store')->middleware('auth');
Route::get('/wp-admin/hiasan/{tema_id}/{id}/edit', [HiasanController::class, 'edit'])->name('wpadmin.hiasan.edit')->middleware('auth');
Route::post('/wp-admin/hiasan/{tema_id}/{id}/edit', [HiasanController::class, 'update'])->name('wpadmin.hiasan.update')->middleware('auth');
Route::delete('/wp-admin/hiasan/{tema_id}/{id}/hapus', [HiasanController::class, 'hapus'])->name('wpadmin.hiasan.hapus')->middleware('auth');

Route::get('/wp-admin/tipe/index', [TipeController::class, 'index'])->name('wpadmin.tipe.index')->middleware('auth');
Route::get('/wp-admin/tipe/create', [TipeController::class, 'create'])->name('wpadmin.tipe.create')->middleware('auth');
Route::post('/wp-admin/tipe/create', [TipeController::class, 'store'])->name('wpadmin.tipe.store')->middleware('auth');
Route::get('/wp-admin/tipe/{id}/show', [TipeController::class, 'show'])->name('wpadmin.tipe.show')->middleware('auth');
Route::get('/wp-admin/tipe/{id}/edit', [TipeController::class, 'edit'])->name('wpadmin.tipe.edit')->middleware('auth');
Route::patch('/wp-admin/tipe/{id}/edit', [TipeController::class, 'update'])->name('wpadmin.tipe.update')->middleware('auth');
Route::delete('/wp-admin/tipe/{id}/delete', [TipeController::class, 'delete'])->name('wpadmin.tipe.delete')->middleware('auth');

Route::get('/wp-admin/single-page/index', [SinglePageController::class, 'index'])->name('wpadmin.singlepage.index')->middleware('auth');
Route::get('/wp-admin/single-page/create', [SinglePageController::class, 'create'])->name('wpadmin.singlepage.create')->middleware('auth');
Route::post('/wp-admin/single-page/create', [SinglePageController::class, 'store'])->name('wpadmin.singlepage.store')->middleware('auth');
