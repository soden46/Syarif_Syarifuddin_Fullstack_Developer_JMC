<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LaporanController;

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
// Route Tampil Data / Halaman Awal
Route::get('/', [AdminController::class, 'data_penduduk'])->name('home');

// Route Filter Cari Data Tabel Penduduk
Route::get('/cari', [AdminController::class, 'data_penduduk'])->name('cari');

// Route Form Tambah Data
Route::get('/create', [AdminController::class, 'create'])->name('create');
Route::post('/create/store', [AdminController::class, 'store']);

// Route Edit Data Penduduk
Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');

// Route Hapus Data Penduduk
Route::post('/delete/{id}', [AdminController::class, 'destroy'])->name('delete');

// Route Depend Provinsi Pada Form Tambah Data
Route::get('getKab/{id}', function ($id) {
    $provinsi = App\Models\kabupaten::where('Provinsi', $id)->get();
    return response()->json($provinsi);
});

// Route Laporan
Route::get('/laporan', [LaporanController::class, 'laporan'])->name('laporan');

// Route Filter Cari Data Laporan
Route::get('/laporan/cari', [LaporanController::class, 'laporan'])->name('laporan/cari');

// Route Cetak Laporan Ke Excel
Route::get('/excel', [LaporanController::class, 'cetak_excel'])->name('excel');
