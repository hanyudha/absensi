<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Absensi; // Pastikan Anda mengimpor model Absensi
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        // Ambil total cuti
        $totalCuti = Cuti::where('UserID', Auth::id())->count();

        // Ambil riwayat cuti per pengguna yang sedang login
        $riwayatCuti = Cuti::where('UserID', Auth::id())->get();

        // Cek apakah pengguna sudah melakukan absensi hari ini
        $hariIni = now()->format('Y-m-d'); // Format tanggal hari ini
        $absensiHariIni = Absensi::where('UserID', Auth::id())
                                  ->whereDate('tanggal', $hariIni)
                                  ->exists(); // Cek apakah ada absensi hari ini

        // Tampilkan view dashboard user dengan data yang dibutuhkan
        return view('user.dashboard', compact('totalCuti', 'riwayatCuti', 'absensiHariIni'));
    }
}
