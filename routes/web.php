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
use App\Http\Controllers\NotificationController;


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

Route::middleware(['auth'])->group(function () {
    Route::resource('departemens', DepartemenController::class);
});

//jabatan
Route::resource('jabatans', JabatanController::class);

Route::middleware(['auth'])->group(function () {
Route::resource('users', UserController::class);
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
});
//admin user
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']);

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});
Route::middleware(['auth', 'user'])->group(function () {

Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
});
//gaji
Route::resource('gajis', GajiController::class);

// Rute untuk pengguna umum
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
    Route::post('/absensi/masuk', [AbsensiController::class, 'absenMasuk'])->name('absensi.masuk');
    Route::post('/absensi/keluar/{id}', [AbsensiController::class, 'absenKeluar'])->name('absensi.keluar');
});

// Rute untuk admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/laporan', [LaporanAbsensiController::class, 'index'])->name('absensi.laporan');
    Route::get('/laporan/download', [LaporanAbsensiController::class, 'downloadPDF'])->name('absensi.laporan.pdf');
});
use App\Http\Controllers\CutiController;

// Route untuk pengajuan cuti
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/cuti', [CutiController::class, 'userIndex'])->name('cuti.index');
    Route::get('/cuti/create', [CutiController::class, 'create'])->name('cuti.create');
    Route::post('/cuti', [CutiController::class, 'store'])->name('cuti.store');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/cuti', [CutiController::class, 'index'])->name('admin.cuti.index');
    Route::put('/admin/cuti/{id}/{status}', [CutiController::class, 'updateStatus'])->name('admin.cuti.updateStatus');
    Route::get('/admin/cuti/{id}', [CutiController::class, 'show'])->name('admin.cuti.show');

});

//route notifikasi user
Route::get('/notifications/mark-as-read/{id}', function ($id) {
    $notification = auth()->user()->notifications()->find($id);
    if ($notification) {
        $notification->markAsRead();
        return redirect()->route('cuti.index');}
        return redirect()->back();
})->name('notifications.markAsRead')->middleware('auth');
// Route untuk menandai semua notifikasi sebagai sudah dibaca
Route::get('/notifications/mark-all-read', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('user.markAllRead')->middleware('auth');

// Route untuk menandai notifikasi spesifik sebagai dibaca untuk admin
Route::get('/admin/notifications/mark-as-read/{id}', function ($id) {
    $notification = auth()->user()->notifications()->find($id);
    
    if ($notification) {
        // Tandai notifikasi sebagai sudah dibaca
        $notification->markAsRead();
        // Arahkan ke halaman admin cuti index setelah notifikasi diklik
        return redirect()->route('admin.cuti.index');}
    return redirect()->back();
})->name('admin.notifications.markAsRead')->middleware('auth');
Route::get('/admin/notifications/mark-all-read', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('admin.markAllRead')->middleware('auth');
