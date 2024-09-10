<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\AdminLogController;
use App\Http\Controllers\LaporanAbsensiController;


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
Auth::routes(['register' => false]);
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//departemen
Route::resource('departemens', DepartemenController::class);

//jabatan
Route::resource('jabatans', JabatanController::class);

//karyawan
Route::resource('users', UserController::class);
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

//admin user
Route::group(['middleware' => 'auth'], function () {
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']);
});
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

//gaji
Route::resource('gajis', GajiController::class);

//absensi
Route::middleware('auth')->group(function () {
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
Route::post('/absensi/masuk', [AbsensiController::class, 'absenMasuk'])->name('absensi.masuk');
Route::post('/absensi/keluar/{id}', [AbsensiController::class, 'absenKeluar'])->name('absensi.keluar');
});
// Laporan Absensi
Route::middleware('auth', 'admin')->group(function () {
    Route::get('/absensi/laporan', [AbsensiController::class, 'laporanAbsensi'])->name('absensi.laporan');
    Route::get('/absensi/laporan/pdf', [AbsensiController::class, 'downloadPDF'])->name('absensi.laporan.pdf');
});

