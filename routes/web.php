<?php

use App\Http\Controllers\Admin\AdminController as Home;
use App\Http\Controllers\Admin\PendudukController as Penduduk;
use App\Http\Controllers\Auth\Admin\LoginController as LoginAdmin;
use App\Http\Controllers\Auth\Admin\LogoutController as LogoutAdmin;
use App\Http\Controllers\Admin\DataKematianPendudukController as DataKematianPenduduk;
use App\Http\Controllers\Admin\DataPindahPendudukController as DataPindahPenduduk;
use App\Http\Controllers\Admin\ManagemenUserPemilihController as ManagemenUserPemilih;
use App\Http\Controllers\Admin\VoterListManagemenController as VoterListManagemen;
use App\Http\Controllers\Auth\User\LoginController as LoginUser;
use App\Http\Controllers\GetDataRegionController as GetDataRegion;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\VoterListController as VoterList;
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

Route::get('/login', [LoginAdmin::class, 'form'])->name('login.form');
Route::post('/login', [LoginAdmin::class, 'login'])->name('login.post');
Route::get('/logout', [LogoutAdmin::class, 'logout'])->name('logout');

Route::get('/home', [Home::class, 'index'])->name('dashboard');
Route::get('/', [HomeController::class, 'index'])->name('home');
//Login User
Route::get('/loginuser', [LoginUser::class, 'form'])->name('loginuser.form');
Route::post('/loginuser', [LoginUser::class, 'login'])->name('loginuser.post');
//Data Daftar Pemilih
Route::get('/managemenvotelist', [VoterListManagemen::class, 'index'])->name('voterlist.managemen');
Route::post('/managemenvotelist', [VoterListManagemen::class, 'store'])->name('voterlist.managemen.store');
Route::post('/managemenvotelist/edit/{daftarPemilih}', [VoterListManagemen::class, 'edit'])->name('voterlist.managemen.edit');
Route::post('/managemenvotelist/update/{daftarPemilih}', [VoterListManagemen::class, 'update'])->name('voterlist.managemen.update');
//Management User Pemilih
Route::get('/managementuser',[ManagemenUserPemilih::class,'index'])->name('managementuser');
Route::get('/managementuser/store',[ManagemenUserPemilih::class,'store'])->name('managementuser.store');
//Daftar Pemilih
Route::get('/voterlist', [VoterList::class, 'index'])->name('voterlist');
Route::post('/voterlist',[VoterList::class, 'store'])->name('voterlist.vote');
//Penduduk
Route::get('/penduduk', [Penduduk::class, 'index'])->name('penduduk');
Route::post('/penduduk', [Penduduk::class, 'store'])->name('penduduk.store');
Route::post('/penduduk/edit/{penduduk}', [Penduduk::class, 'edit'])->name('penduduk.edit');
Route::post('/penduduk/update/{penduduk}', [Penduduk::class, 'update'])->name('penduduk.update');
Route::delete('/penduduk/{penduduk}', [Penduduk::class, 'destroy'])->name('penduduk.destroy');
//Kematian Penduduk
Route::get('/kematianpenduduk', [DataKematianPenduduk::class, 'index'])->name('kematianpenduduk');
Route::post('/kematianpenduduk', [DataKematianPenduduk::class, 'store'])->name('kematianpenduduk.store');
//Pindah Penduduk
Route::get('/pindahpenduduk', [DataPindahPenduduk::class, 'index'])->name('pindahpenduduk');
Route::post('/pindahpenduduk', [DataPindahPenduduk::class, 'store'])->name('pindahpenduduk.store');
//Pencarian
Route::get('/pencarian', [HomeController::class, 'pencarian'])->name('home.pencarian');
//Region
Route::post('/get-kabupaten/{id}', [GetDataRegion::class, 'getKabupaten'])->name('get-kabupaten');
Route::post('/get-kecamatan/{id}', [GetDataRegion::class, 'getKecamatan'])->name('get-kecamatan');
Route::post('/get-desa/{id}', [GetDataRegion::class, 'getDesa'])->name('get-desa');
