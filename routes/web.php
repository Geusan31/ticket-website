<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
    return view('index', ['title' => 'Home']);
});

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest:penumpang');
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest:petugas');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest:penumpang')->name('login');
Route::get('/login', [LoginController::class, 'index'])->middleware('guest:petugas')->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('petugas');