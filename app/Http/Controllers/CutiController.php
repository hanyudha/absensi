<?php
namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
{
    // Tampilkan form pengajuan cuti untuk user
    public function create()
    {
        return view('user.cuti.create');
    }

    // Simpan pengajuan cuti oleh user
    public function store(Request $request)
    {
        $request->validate([
            'alasan' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        Cuti::create([
            'UserID' => Auth::id(),
            'alasan' => $request->alasan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        return redirect()->route('cuti.index')->with('success', 'Pengajuan cuti berhasil dikirim.');
    }

    // Tampilkan daftar pengajuan cuti untuk admin
    public function index()
    {
        $cutis = Cuti::with('user')->get();
        return view('admin.cuti.index', compact('cutis'));
    }

    // Admin mengubah status cuti
    public function updateStatus($id, $status)
    {
        $cuti = Cuti::findOrFail($id);
        $cuti->status = $status;
        $cuti->save();

        return redirect()->route('admin.cuti.index')->with('success', 'Status cuti berhasil diperbarui.');
    }
}

