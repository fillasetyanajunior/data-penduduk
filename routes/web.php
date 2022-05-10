<?php

use App\Http\Controllers\Admin\AdminController as Home;
use App\Http\Controllers\Admin\PendudukController as Penduduk;
use App\Http\Controllers\Auth\Admin\LoginController as AuthLogin;
use App\Http\Controllers\Auth\Admin\LogoutController as AuthLogout;
use App\Http\Controllers\Admin\DataKematianPendudukController as DataKematianPenduduk;
use App\Http\Controllers\Admin\DataPindahPendudukController as DataPindahPenduduk;
use App\Http\Controllers\GetDataRegionController as GetDataRegion;
use App\Http\Controllers\HomeController;
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

Route::get('/login', [AuthLogin::class, 'form'])->name('login.form');
Route::post('/login', [AuthLogin::class, 'login'])->name('login.post');
Route::get('/logout', [AuthLogout::class, 'logout'])->name('logout');

Route::get('/home', [Home::class, 'index'])->name('dashboard');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/penduduk', [Penduduk::class, 'index'])->name('penduduk');
Route::post('/penduduk', [Penduduk::class, 'store'])->name('penduduk.store');
Route::post('/penduduk/edit/{penduduk}', [Penduduk::class, 'edit'])->name('penduduk.edit');
Route::post('/penduduk/update/{penduduk}', [Penduduk::class, 'update'])->name('penduduk.update');
Route::delete('/penduduk/{penduduk}', [Penduduk::class, 'destroy'])->name('penduduk.destroy');

Route::get('/kematianpenduduk', [DataKematianPenduduk::class, 'index'])->name('kematianpenduduk');
Route::post('/kematianpenduduk', [DataKematianPenduduk::class, 'store'])->name('kematianpenduduk.store');

Route::get('/pindahpenduduk', [DataPindahPenduduk::class, 'index'])->name('pindahpenduduk');
Route::post('/pindahpenduduk', [DataPindahPenduduk::class, 'store'])->name('pindahpenduduk.store');

Route::get('/pencarian', [HomeController::class, 'pencarian'])->name('home.pencarian');

Route::post('/get-kabupaten/{id}', [GetDataRegion::class, 'getKabupaten'])->name('get-kabupaten');
Route::post('/get-kecamatan/{id}', [GetDataRegion::class, 'getKecamatan'])->name('get-kecamatan');
Route::post('/get-desa/{id}', [GetDataRegion::class, 'getDesa'])->name('get-desa');
