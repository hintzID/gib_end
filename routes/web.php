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
use App\Http\Controllers\PrioritasController;
use App\Models\User;

use App\Http\Controllers\HomeController;

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

if (User::count() > 0) {
    Auth::routes(['register' => false]);
} else {
    Auth::routes(['register' => true]);
}


Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route untuk akses admin dan komandan
Route::middleware(['role:admin,komandan'])->group(function () {
    // Pengaturan anggota
    Route::resource('calon-anggota', CalonAnggotaController::class);
    Route::resource('verifikasi-calon-anggota', VerifikasiCalonAnggotaController::class);
    Route::resource('anggota', AnggotaController::class);

    // Pengaturan user
    Route::resource('peran', PeranController::class);
    Route::resource('user', User2Controller::class);

    // Pengaturan pondok mitra
    Route::resource('prioritas', PrioritasController::class);
    Route::resource('calon-mitra', CalonMitraController::class);
    Route::resource('pondok', PondokController::class);
    Route::resource('daftar_trip', DaftarTripController::class);
    Route::resource('trip-penyaluran-dana', TripPenyaluranDanaController::class);
    Route::resource('daftar-ota', DaftarOtaController::class);
    Route::resource('stok', StokController::class);
    Route::resource('profile', ProfileController::class);
});
