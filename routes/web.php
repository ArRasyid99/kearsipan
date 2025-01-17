<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('/pendataan', \App\Http\Controllers\DocumentController::class);
    Route::resource('/category', \App\Http\Controllers\CategoryController::class);
    Route::resource('/status', \App\Http\Controllers\StatusController::class);

    Route::get('/11', function () {
        return view('arsip.aktif');
    })->name('11');

    Route::get('/12', function () {
        return view('arsip.inaktif');
    })->name('12');

    Route::get('/13', function () {
        return view('arsip.vital');
    })->name('13');

    Route::get('/14', function () {
        return view('arsip.statis');
    })->name('14');

    Route::get('/15', function () {
        return view('peminjaman');
    })->name('15');






});
