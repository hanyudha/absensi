<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
{
    public function userIndex()
    {
        // Ambil data cuti untuk user yang sedang login berdasarkan UserID
        $cutis = Cuti::where('UserID', auth()->user()->UserID)->get();
        return view('cuti.index', compact('cutis'));
    }
    

    // Tampilkan form pengajuan cuti untuk user
    public function create()
    {
        return view('cuti.create');
    }

    // Simpan pengajuan cuti oleh user
    public function store(Request $request)
    {
        $request->validate([
            'alasan' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        
        // Di dalam fungsi store()
        $cuti = Cuti::create([
            'UserID' => Auth::id(),
            'alasan' => $request->alasan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status' => 'pending', // Set default status
        ]);

return redirect()->route('cuti.index')->with('success', 'Pengajuan cuti berhasil dikirim.');  
    }

    // Tampilkan daftar pengajuan cuti untuk admin
    public function index(Request $request)
    {

    // Ambil nilai pencarian dari request
    $search = $request->input('search');

    // Query untuk mengambil semua data cuti beserta user-nya
    $cutis = Cuti::with('user')
                ->when($search, function ($query, $search) {
                    return $query->whereHas('user', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    });
                })
                ->get();

    // Return view ke admin.cuti.index dengan data cuti
    return view('admin.cuti.index', compact('cutis'));
}
    
public function updateStatus($id, $status)
{
    // Ambil data cuti berdasarkan ID
    $cuti = Cuti::findOrFail($id);
    // Update status cuti
    $cuti->status = $status;
    $cuti->save();
     return redirect()->route('admin.cuti.index')->with('success', 'Status cuti berhasil diubah.');
 }


    public function show($id)
{
    // Ambil data cuti berdasarkan ID
    $cuti = Cuti::findOrFail($id);


    return view('admin.cuti.show', compact('cuti'));
}

}
