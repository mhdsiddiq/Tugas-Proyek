<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResepObatController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\DashboardDokterController;




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

Route::get('/', function () {;
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/dashboard', [DashboardController::class, 'index']);
// Route Pasien
Route::get('/pasien/index', [PasienController::class, 'index'])->name('pasien.index');
Route::get('/pasien/create', [PasienController::class, 'create']);
Route::post('/pasien/store', [PasienController::class, 'store']);
Route::get('/pasien/{id}/edit', [PasienController::class, 'edit']);
Route::put('/pasien/{id}', [PasienController::class, 'update'])->name('pasien.update');
Route::delete('/pasien/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');


// Route Obat
// Route::resource('obat', ObatController::class);


Route::get('/obat/index', [ObatController::class, 'index'])->name('obat.index');
Route::get('/obat/create', [ObatController::class, 'create']);
Route::post('/obat/store', [ObatController::class, 'store']);
Route::get('/obat/{id}/edit', [ObatController::class, 'edit']);
Route::put('/obat/{id}', [ObatController::class, 'update'])->name('obat.update');
Route::delete('/obat/{id}', [ObatController::class, 'destroy'])->name('obat.destroy');


Route::get('/dokter/index', [DokterController::class, 'index'])->name('dokter.index');
Route::get('/dokter/create', [DokterController::class, 'create'])->name('dokter.create');
Route::post('/dokter/store', [DokterController::class, 'store'])->name('dokter.store');
Route::get('/dokter/{id}/edit', [DokterController::class, 'edit'])->name('dokter.edit');
Route::put('/dokter/{id}', [DokterController::class, 'update'])->name('dokter.update');
Route::delete('/dokter/{id}', [DokterController::class, 'destroy'])->name('dokter.destroy');
// Route::middleware(['auth', 'role_id:3'])->group(function () {
// });
Route::middleware(['can:isDokter'])->group(function () {
    Route::get('/dashboard-dokter', [DashboardDokterController::class, 'index'])->name('dashboard-dokter');
    Route::get('/index-rekam-medis', [RekamMedisController::class, 'index']);
    Route::get('/input-rekam-medis/{id}', [DokterController::class, 'inputRekamMedis'])->name('input.rekam.medis');
});

// Route untuk form reservasi
Route::get('/pasien/{id}/reservasi/create', [ReservasiController::class, 'create'])
    ->name('reservasi.create');

// Route untuk menyimpan reservasi
Route::post('/reservasi/store', [ReservasiController::class, 'store'])
    ->name('reservasi.store');

Route::get('/reservasi/index', [ReservasiController::class, 'index'])->name('reservasi.index');

Route::post('/simpan-rekam-medis', [RekamMedisController::class, 'simpan'])->name('simpan.rekam.medis');

Route::get('{id}/resep/create', [ResepObatController::class, 'create'])->name('resep.create_resep_obat');
Route::post('/resep/store', [ResepObatController::class, 'store'])->name('resep.store');
Route::get('/dokter/index_resep_obat', [ResepObatController::class, 'index'])->name('resep.index');
