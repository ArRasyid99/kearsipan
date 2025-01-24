<?php

use App\Http\Controllers\BorrowController;
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


    Route::resource('/dashboard',\App\Http\Controllers\DashboardController::class);
    Route::resource('/pendataan', \App\Http\Controllers\DocumentController::class);
    Route::resource('/category', \App\Http\Controllers\CategoryController::class);
    Route::resource('/label', \App\Http\Controllers\LabelController::class);
    Route::resource('/aktif', \App\Http\Controllers\ArsipAktifController::class);
    Route::resource('/inaktif', \App\Http\Controllers\ArsipInaktifController::class);
    Route::resource('/vital', \App\Http\Controllers\ArsipVitalController::class);
    Route::resource('/statis', \App\Http\Controllers\ArsipStatisController::class);
    Route::resource('/peminjaman', \App\Http\Controllers\BorrowController::class);
    Route::post('/peminjaman/return/{id}', [BorrowController::class, 'return'])->name('peminjaman.return');
    Route::get('/riwayat', [BorrowController::class, 'recent'])->name('peminjaman.recent');










});
