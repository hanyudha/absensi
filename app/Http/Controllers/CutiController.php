<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Cuti;
use App\Notifications\CutiSubmittedNotification; 
use App\Notifications\CutiStatusChangedNotification; 
use App\Notifications\LeaveRequestNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
{
    public function userIndex(Request $request)
    {
        $query = Cuti::where('UserID', auth()->user()->UserID);
        if ($request->has('tanggal_mulai') && $request->tanggal_mulai != null) {
            $query->whereDate('tanggal_mulai', '=', $request->tanggal_mulai);
        }
        $cutis = $query->orderBy('created_at', 'desc')->paginate(10);
    
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
            'status' => 'pending', 
        ]);

  // Kirim notifikasi ke admin
  $admins = User::where('role_as', 'admin')->get();
  \Notification::send($admins, new CutiSubmittedNotification($cuti));

return redirect()->route('cuti.index')->with('success', 'Pengajuan cuti berhasil dikirim.');  
    }

    // Tampilkan daftar pengajuan cuti untuk admin
    public function index(Request $request)
    {

    $search = $request->input('search');
    $cutis = Cuti::with('user')
                ->when($search, function ($query, $search) {
                    return $query->whereHas('user', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    });
                })
                ->orderBy('created_at', 'desc')->paginate(10);

    return view('admin.cuti.index', compact('cutis'));
}
    
public function updateStatus($id, $status)
{
    // Ambil data cuti berdasarkan ID
    $cuti = Cuti::findOrFail($id);
    // Update status cuti
    $cuti->status = $status;
    $cuti->save();

      // Kirim notifikasi ke user
      $user = $cuti->user;
      $user->notify(new CutiStatusChangedNotification($cuti));
  
     return redirect()->route('admin.cuti.index')->with('success', 'Status cuti berhasil diubah.');
 }

public function submitLeaveRequest(Request $request)
{
    // Validasi input data
    $request->validate([
        'alasan' => 'required|string|max:255',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
    ]);

    // Buat pengajuan cuti baru
    $leaveRequest = LeaveRequest::create($request->all());

    // Kirim notifikasi ke admin
    $admin = User::where('role_as', 'admin')->first(); // Asumsikan Anda menggunakan role admin
    if ($admin) {
        $admin->notify(new LeaveRequestNotification($leaveRequest));
    }

    return redirect()->back()->with('success', 'Pengajuan cuti berhasil dikirim!');
}


public function updateLeaveRequest(Request $request, $id)
{
    $leaveRequest = LeaveRequest::findOrFail($id);
    // Update status cuti
    $leaveRequest->update($request->all());

    // Kirim notifikasi ke pengguna
    $leaveRequest->user->notify(new LeaveRequestUpdateNotification($leaveRequest));
    return redirect()->back()->with('success', 'Pengajuan cuti berhasil diperbarui!');
}


}
