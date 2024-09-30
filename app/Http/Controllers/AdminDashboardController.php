<?php
namespace App\Http\Controllers;
use App\Models\Cuti;
use App\Models\Absensi; 
use App\Models\User;
use App\Models\Jabatans;
use Carbon\Carbon; // Tambahkan ini untuk menggunakan Carbon
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
  public function index()
{
    // Menghitung jumlah karyawan, menggunakan kolom role_as yang berisi 'user'
    $totalUsers = User::where('role_as', 'user')->count();
    
    // Menghitung jumlah absensi yang sudah masuk hari ini
    $today = Carbon::today(); // Mendapatkan tanggal hari ini
    $totalAbsensis = Absensi::whereDate('Tanggal', $today)
        ->whereNotNull('WaktuMasuk')
        ->count();

    // Mengambil data absensi hari ini
    $absensiHariIni = Absensi::whereDate('Tanggal', $today)
        ->with('user') // Menggunakan relasi untuk mengambil data karyawan
        ->get();
    
    // Menghitung jumlah jabatan
    $totalJabatans = Jabatans::count();
    
    $cutis = Cuti::with('user')->get(); // Jangan lupa tambahkan relasi dengan 'user' jika perlu
    $totalCuti = $cutis->count();

    // Mengirim data totalUsers, totalJabatans, totalAbsensis, absensiHariIni, dan cutis ke view
    return view('admin.dashboard', compact('totalUsers', 'totalCuti', 'totalJabatans', 'totalAbsensis', 'absensiHariIni', 'cutis'));
}

}
