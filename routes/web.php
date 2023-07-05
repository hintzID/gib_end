<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\CalonAnggotaController;
use App\Http\Controllers\VerifikasiCalonAnggotaController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeranController;
use App\Http\Controllers\User2Controller;
use App\Http\Controllers\CalonMitraController;
use App\Http\Controllers\PondokController;
use App\Http\Controllers\DaftarTripController;
use App\Http\Controllers\TripPenyaluranDanaController;
use App\Http\Controllers\DaftarOtaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StokController;



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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('calon-anggota', CalonAnggotaController::class)->only(['create', 'store']);

//route akses admin
Route::middleware(['role:admin'])->group(function () {


});

//pengaturan sistem anggota
Route::resource('calon-anggota', CalonAnggotaController::class)->except(['create', 'store']);
Route::resource('verifikasi-calon-anggota', VerifikasiCalonAnggotaController::class);
Route::resource('anggota', AnggotaController::class);

//pengaturan user
Route::resource('peran', PeranController::class);
Route::resource('user', User2Controller::class);
//pengaturan pondok mitra
Route::resource('calon-mitra', CalonMitraController::class);
Route::resource('pondok', PondokController::class);
Route::resource('daftar_trip', DaftarTripController::class);
Route::resource('trip-penyaluran-dana', TripPenyaluranDanaController::class);
Route::resource('daftar-ota', DaftarOtaController::class);
Route::resource('stok', StokController::class);
Route::resource('profile', ProfileController::class);


//route akses member
Route::middleware(['role:member'])->group(function () {


    });
