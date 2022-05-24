<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('index');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'cekrole:admin'], function () {
        route::get('/adminDash', [AdminController::class, 'index'])->name('adminDash');
        route::get('/adminUser', [AdminController::class, 'user_manage'])->name('adminUser');
        route::post('/tambahPenjoki', [AdminController::class, 'tambah_penjoki'])->name('tambahPenjoki');
        route::get('/deleteUser/{id}', [AdminController::class, 'del_user']);
    });
});

// login authentication
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/loginAuth', [AuthController::class, 'login_authenticate'])->name('loginAuth');

// daftar authentication
Route::get('/daftar', function () {
    return view('daftar');
})->name('daftar');
Route::post('/daftarAuth', [AuthController::class, 'daftar_authenticate'])->name('daftarAuth');

// logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
