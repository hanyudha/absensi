<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\User;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf; 

class AbsensiController extends Controller
{
    // Fungsi untuk menampilkan halaman index absensi
    public function index()
    {
        if (auth()->check()) {
            $userID = auth()->user()->UserID;
            $currentDate = Carbon::now('Asia/Jakarta')->toDateString();

            $absensi = Absensi::where('UserID', $userID)->orderBy('Tanggal', 'desc')->get();
            $absensiHariIni = Absensi::where('UserID', $userID)
                ->where('Tanggal', $currentDate)
                ->first();

            return view('absensi.index', compact('absensi', 'absensiHariIni'));
        }

        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    // Fungsi absen masuk
    public function absenMasuk()
    {
        if (auth()->check()) {
            $userID = auth()->user()->UserID;
            $currentDate = Carbon::now('Asia/Jakarta')->toDateString();
            $absensiHariIni = Absensi::where('UserID', $userID)
                ->where('Tanggal', $currentDate)
                ->first();

            if ($absensiHariIni && $absensiHariIni->WaktuMasuk) {
                return redirect()->back()->with('error', 'Anda sudah melakukan absen masuk hari ini.');
            }

            $absensi = new Absensi();
            $absensi->UserID = $userID;
            $absensi->Tanggal = $currentDate;

            $waktuSekarang = Carbon::now('Asia/Jakarta');
            $absensi->Hari = $waktuSekarang->locale('id')->translatedFormat('l');
            $absensi->WaktuMasuk = $waktuSekarang->toTimeString();

            if ($waktuSekarang->gt(Carbon::createFromTime(8, 0, 0, 'Asia/Jakarta'))) {
                $absensi->Keterangan = 'Terlambat';
            } else {
                $absensi->Keterangan = 'Hadir';
            }

            $absensi->save();

            return redirect()->back()->with('success');
        }

        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    // Fungsi absen keluar
    public function absenKeluar($id)
    {
        if (auth()->check()) {
            $absensi = Absensi::find($id);

            if (!$absensi) {
                return redirect()->back()->with('error', 'Data absensi tidak ditemukan.');
            }

            $waktuSekarang = Carbon::now('Asia/Jakarta');
            $checkOutTime = Carbon::createFromTime(16, 0, 0, 'Asia/Jakarta');

            if ($waktuSekarang->lt($checkOutTime)) {
                return redirect()->back()->with('error', 'Belum waktu absensi pulang.');
            }

            if (is_null($absensi->WaktuMasuk)) {
                return redirect()->back()->with('error', 'Anda belum melakukan absen masuk.');
            }

            if (!is_null($absensi->WaktuKeluar)) {
                return redirect()->back()->with('error', 'Anda sudah melakukan absen keluar.');
            }

            $absensi->WaktuKeluar = $waktuSekarang->toTimeString();
            $absensi->save();

            return redirect()->back()->with('success', 'Anda telah absen keluar!');
        }

        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    public function laporanAbsensi(Request $request)
    {
        if (auth()->user()->role_as !== 'admin') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk melihat laporan ini.');
        }
    
        // Ambil parameter tanggal dan bulan dari request
        $tanggal = $request->input('tanggal');
        $bulan = $request->input('bulan');
    
        // Query absensi dengan filter jika tanggal atau bulan diberikan
        $query = Absensi::with('user');
        if ($tanggal) {
            $query->whereDate('Tanggal', $tanggal);
        } elseif ($bulan) {
            $query->whereMonth('Tanggal', $bulan);
        }
        
        $dataAbsensi = $query->get();
    
        return view('absensi.laporan', compact('dataAbsensi'));
    }
    

    // Fungsi untuk mengunduh laporan dalam bentuk PDF
    public function downloadPDF()
    {
        if (auth()->user()->role_as !== 'admin') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mendownload laporan ini.');
        }

        $absensi = Absensi::with('user')->orderBy('Tanggal', 'desc')->get();
        $pdf = Pdf::loadView('absensi.laporan_pdf', compact('absensi'));

        // Return file PDF untuk di-download
        return $pdf->download('laporan_absensi.pdf');
    }
}