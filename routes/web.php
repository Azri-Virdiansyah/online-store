<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtamaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;




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
Route::get('/', [UtamaController::class, 'index']); // Route untuk menampilkan halaman utama
Route::post('/pushData', [UtamaController::class, 'store']); // Route untuk menyimpan data
Route::get('/Login', [LoginController::class, 'index']);
Route::post('/Daftar', [LoginController::class, 'Register']);
Route::post('/Login', [LoginController::class, 'Login']);
Route::get('/Keluar', [LoginController::class, 'Keluar']);
Route::post('/AddCart', [OrderController::class, 'Order']);
Route::get('/Keranjang', [OrderController::class, 'Keranjang']);
Route::get('/Checkout', [OrderController::class, 'Checkout']);
Route::get('/Checkout_list', [OrderController::class, 'Checkout_list']);
Route::get('/Confirm', [OrderController::class, 'Confirm']);
Route::post('/Konfirm', [OrderController::class, 'Confirm_simpan']);
