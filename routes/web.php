<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\UserController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/', function () {
    return view('components.login');
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

Route::get('/content/rekap-biaya', function () {
    return view('partials.rekap-biaya');
})->name('biaya.create');

Route::post('/pengguna/tambah', [UserController::class, 'store'])->name('pengguna.store');

// Obat Routes
Route::prefix('obat')->name('obat.')->group(function () {
    Route::get('/', [ObatController::class, 'index'])->name('index');
    Route::get('/dashboard', [ObatController::class, 'dashboard'])->name('dashboard');
    Route::get('/create', [ObatController::class, 'create'])->name('create');
    Route::post('/', [ObatController::class, 'store'])->name('store');
    Route::get('/{obat}', [ObatController::class, 'show'])->name('show');
    Route::get('/{obat}/edit', [ObatController::class, 'edit'])->name('edit');
    Route::put('/{obat}', [ObatController::class, 'update'])->name('update');
    Route::delete('/{obat}', [ObatController::class, 'destroy'])->name('destroy');
    
    // Rekapitulasi
    Route::get('/rekapitulasi/bulanan', [ObatController::class, 'rekapitulasi'])->name('rekapitulasi');
    
    // Transaksi
    Route::post('/{obat}/transaksi', [ObatController::class, 'addTransaksi'])->name('transaksi.store');
    Route::post('/{obat}/transaksi-harian', [ObatController::class, 'updateTransaksiHarian'])->name('transaksi.harian');
    
    // Import/Export
    Route::post('/import', [ObatController::class, 'import'])->name('import');
    Route::get('/export', [ObatController::class, 'exportExcel'])->name('export');
});

// Default redirect ke dashboard obat
Route::redirect('/dashboard', '/obat/dashboard');
