<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\MasterUserController;
use App\Http\Controllers\PenjualanBarangController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\ImtController;
use Illuminate\Routing\RouteGroup;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login Controller
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/masterbarang/get/{masterbarang:kode_barang}', [MasterBarangController::class, 'get']);
    Route::resource('/penjualanbarang', PenjualanBarangController::class)->except('show');
    Route::get('/getpdf/{penjualanbarang:nomor_penjualan}', [PenjualanBarangController::class, 'getpdf']);
    Route::resource('/laporanpenjualan', LaporanPenjualanController::class)->only('index');

    Route::get('/imt', [ImtController::class, 'index']);
    Route::post('/imt', [ImtController::class, 'store']);
    
    Route::get('/kie', [DashboardController::class, 'kie']);

    Route::get('/pemantauan', [DashboardController::class, 'pemantauan']);

    Route::get('/reportimt', [ImtController::class, 'reportimt']);

    Route::get('/catatan', [DashboardController::class, 'catatanMingguan']);
    Route::post('/catatan', [DashboardController::class, 'catatanMingguanInsert']);
    Route::post('/catatan/minggu1', [DashboardController::class, 'minggu1insert']);
    Route::post('/catatan/minggu2', [DashboardController::class, 'minggu2insert']);
    Route::post('/catatan/minggu3', [DashboardController::class, 'minggu3insert']);
    Route::post('/catatan/minggu4', [DashboardController::class, 'minggu4insert']);
});

Route::middleware('admin')->group(function () {
    Route::resource('/masteruser', MasterUserController::class);
    Route::resource('/masterbarang', MasterBarangController::class);
    Route::post('/importbarang', [MasterBarangController::class, 'importBarang']);
    Route::get('/exportbarang', [MasterBarangController::class, 'exportBarang']);
});

