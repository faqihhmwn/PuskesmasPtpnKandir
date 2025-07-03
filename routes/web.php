<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\LaporanController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/', function () {
    // return view('components.login');
    return view('dashboard');
});

Route::get('/content/home', function () {
    return view('partials.home');
});

Route::get('/content/data-pengguna', function () {
    return view('partials.data-pengguna');
});

Route::get('/content/data-pasien', function () {
    return view('partials.data-pasien');
});

Route::get('/content/contact', function () {
    return view('partials.contact');
});

Route::get('/data-pengguna', function () {
    return view('data-pengguna');
});

//Route AJAX untuk CRUD
Route::post('/pengguna', [PenggunaController::class, 'store']);
Route::put('/pengguna/{id}', [PenggunaController::class, 'update']);
Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy']);

Route::view('/laporan', 'data-laporan-kesehatan');
Route::post('/laporan/store', [LaporanController::class, 'lp']);
