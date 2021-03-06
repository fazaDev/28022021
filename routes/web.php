<?php

use App\Http\Livewire\Spp\IndexSpp;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Guru\IndexGuru;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Siswa\IndexSiswa;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\HistoryPembayaranController;

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

// Route::get('/', function () {
//     return view('landing');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/siswa', IndexSiswa::class)->name('siswa');
Route::get('/guru', IndexGuru::class)->name('guru');
Route::get('/pembayaran-spp', IndexSpp::class)->name('pembayaran-spp');
Route::get('/cetak/{uuid}', [PembayaranController::class, 'cetakById'])->name('cetak');
Route::get('/history-pembayaran', [HistoryPembayaranController::class, 'index'])->name('history');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/sync', [UserController::class, 'sycn_user_siswa'])->name('users.sync');

Route::get('user/ganti-password/{id}', [UserController::class, 'reset_password']);
Route::resource('/halaman', HalamanController::class);

Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index'])->name('frontend.index');
Route::get('/{slug}', [App\Http\Controllers\LandingPageController::class, 'show'])->name('frontend.detail');
