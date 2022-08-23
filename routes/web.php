<?php

use App\Http\Controllers\Buah_Controller;
use App\Http\Controllers\Halaman;
use App\Http\Controllers\HalamanAdmin_Controller;
use App\Http\Controllers\HalamanUtama;
use App\Http\Controllers\HalamanUtama_Controller;
use App\Http\Controllers\InformasiAkun_Controller;
use App\Http\Controllers\Katalog_Controller;
use App\Http\Controllers\Sayuran_Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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




// Auth::routes();



 
// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |
// */
  
// Route::get('/home', [HomeController::class, 'index'])->name('home');

// /*------------------------------------------
// --------------------------------------------
// All Normal Users Routes List
// --------------------------------------------
// --------------------------------------------*/
// Route::middleware(['auth', 'user-access:user'])->group(function () {
  
//     Route::get('/home', [HomeController::class, 'index'])->name('home');
// });
  
// /*------------------------------------------
// --------------------------------------------
// All Admin Routes List
// --------------------------------------------
// --------------------------------------------*/
// Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
//     Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
//     Route::resource('/halaman_utama', Halaman::class);
// });


// Route::get('/Daftar_Buah', [Daftar_Buah::class, 'index'])->name('daftar_buah');
// Route::get('/Daftar_Sayur', [Daftar_Sayur::class, 'index'])->name('daftar_sayur');
  
// /*------------------------------------------
// --------------------------------------------
// All Admin Routes List
// --------------------------------------------
// --------------------------------------------*/
// Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
//     Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
// });
 

// Sementara

// Mail
Route::get('/kode_konfirmasi', [HalamanAdmin_Controller::class, 'mail']);


// User
Route::get('/', [HalamanUtama_Controller::class, 'index'])->name('home_user');
Route::resource('/home', HalamanUtama_Controller::class);
Route::get('/find', [HalamanUtama_Controller::class, 'find'])->name('home_user');
Route::resource('/buah', Buah_Controller::class);
Route::resource('/sayur', Sayuran_Controller::class);


// Admin
Route::resource('/halaman_admin', HalamanAdmin_Controller::class);
Route::resource('/katalog', Katalog_Controller::class);
Route::resource('/informasi_akun', InformasiAkun_Controller::class);
// Route::resource('/')

// Supplier

// Penjual