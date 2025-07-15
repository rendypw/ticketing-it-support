<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PengajuanTicketingController;
use App\Http\Controllers\DataTicketingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
|
*/

 Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/process-login', [LoginController::class, 'login']);

Route::group(['middleware'=>'auth'],function(){

    Route::get('/log', [HomeController::class, 'log']);
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/tentang-sistem', [HomeController::class, 'tentangsistem']);
    Route::get('/logout', [LoginController::class, 'logout']);

    Route::get('/ajukan-tiket', [PengajuanTicketingController::class, 'index']);
    Route::post('/kirim-tiket', [PengajuanTicketingController::class, 'inputTicketing']);

    Route::get('/data-tiket', [DataTicketingController::class, 'index']);    
    Route::post('/filter', [DataTicketingController::class, 'filterTicket'])->name('filter.ticket');
    Route::get('/detail-data-tiket/{id}', [DataTicketingController::class, 'dataDetail']);
    Route::post('/simpan-proses-tiket/{id}', [DataTicketingController::class, 'inputProsesTicketing']);

    Route::get('/data-user', [UserController::class, 'index']);
    Route::get('/tambah-user', [UserController::class, 'tambahUser']);
    Route::post('/simpan-user-baru', [UserController::class, 'simpanUserBaru']);
    Route::get('/kelola-user/{id_user}', [UserController::class, 'kelolaUser']);
    Route::post('/simpan-kelola-user/{id_user}', [UserController::class, 'simpanKelolaUser']);

});
