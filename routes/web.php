<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\getTransportasiController;
use App\Http\Controllers\getTransportasiKursi;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\TransportasiController;
use App\Http\Controllers\Type_TransportasiController;
use App\Http\Controllers\ValidateController;
use App\Http\Controllers\getTypeTransportasi;
use App\Http\Controllers\PembayaranController;
use App\Models\Rute;
use App\Models\Transportasi;
use Illuminate\Support\Facades\Log;
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
    return view('index', [
        'title' => 'Home',
        'transportasi' => Transportasi::all(),
        'rutes' => Rute::all(),
        'rutePesawat' => Rute::where('id_type_transportasi')
    ]);
});

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest:penumpang');
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest:petugas');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest:penumpang')->name('login');
Route::get('/login', [LoginController::class, 'index'])->middleware('guest:petugas')->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::group(['middleware' => ['cekLevel:2']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard/validate', [ValidateController::class, 'index']);
    Route::put('/dashboard/validate/{id}', [PemesananController::class, 'update']);
    Route::get('/dashboard/laporan', [LaporanController::class, 'index']);
    Route::get('/dashboard/laporan_pemesanan', [LaporanController::class, 'print']);
});

Route::group(['middleware' => ['cekLevel:1']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/dashboard/rute', RuteController::class);
    Route::resource('/dashboard/transportasi', TransportasiController::class);
    Route::resource('/dashboard/type_transportasi', Type_TransportasiController::class);
    Route::get('/get-transportasi/{id}', [getTransportasiController::class, 'getTransportasi']);
    Route::get('/dashboard/validate', [ValidateController::class, 'index']);
    Route::put('/dashboard/validate/{id}', [PemesananController::class, 'update']);
    Route::get('/dashboard/laporan', [LaporanController::class, 'index']);
    Route::get('/dashboard/laporan_pemesanan', [LaporanController::class, 'print']);
});


Route::get('/order', [OrderController::class, 'index'])->middleware('cekPenumpang');
Route::post('/order', [PembayaranController::class, 'index']);

Route::post('/pemesanan', [PemesananController::class, 'pesan'])->middleware('cekPenumpang');


Route::get('/getTransportasi/{id}', [getTransportasiKursi::class, 'getTransportasi']);
Route::get('/getTypeTransportasi/{transportasi}', [getTypeTransportasi::class, 'getTypeTransportasi']);
