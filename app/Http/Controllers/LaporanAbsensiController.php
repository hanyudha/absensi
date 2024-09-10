<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use Carbon\Carbon;
use PDF;

class LaporanAbsensiController extends Controller
{
    public function index(Request $request)
    {
        // Pastikan pengguna sudah login
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil ID user yang sedang login
        $userID = auth()->user()->UserID;

        // Ambil tanggal mulai dan tanggal akhir dari request, jika ada
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->toDateString());
        $endDate = $request->input('end_date', Carbon::now()->endOfMonth()->toDateString());

        // Ambil data absensi dalam rentang tanggal
        $absensi = Absensi::where('UserID', $userID)
            ->whereBetween('Tanggal', [$startDate, $endDate])
            ->orderBy('Tanggal', 'desc')
            ->get();

        // Kirim data ke view laporan
        return view('laporan.index', compact('absensi', 'startDate', 'endDate'));
    }

    public function exportPdf(Request $request)
    {
        // Pastikan pengguna sudah login
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $userID = auth()->user()->UserID;
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->toDateString());
        $endDate = $request->input('end_date', Carbon::now()->endOfMonth()->toDateString());

        $absensi = Absensi::where('UserID', $userID)
            ->whereBetween('Tanggal', [$startDate, $endDate])
            ->orderBy('Tanggal', 'desc')
            ->get();

        $pdf = PDF::loadView('laporan.pdf', compact('absensi', 'startDate', 'endDate'));
        return $pdf->download('laporan_absensi.pdf');
    }
}
