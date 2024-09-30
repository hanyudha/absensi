<?php

namespace App\Http\Controllers;

use App\Models\Departemens;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Departemens::query();
        
        if ($search) {
            $query->where('NamaDepartemen', 'like', '%' . $search . '%');
        }
        
        $departemens = $query->orderBy('created_at', 'desc')->paginate(10); 
        
        return view('departemens.index', compact('departemens'));
    }
                   
    public function create()
    {
        return view('departemens.create');
    }

    public function store(Request $request)
    {
        //validate the request data
        $this->validate($request, [
            'NamaDepartemen' => 'required|max:225',
        ]);
    
        // Simpan data departemen
        Departemens::create($request->all());
    return redirect()->route('departemens.index')->with('success', 'Berhasil Membuat Departemen');
}
    
    
    public function edit($id)
    {
        $departemen = Departemens::findOrFail($id);
        return view('departemens.edit', compact('departemen'));
    }
                    
    public function update(Request $request, $id)
    {
        // Validasi data yang diinput
        $this->validate($request, [
            'NamaDepartemen' => 'required|max:225',
        ]);
        
        // Update data departemen
        $departemen = Departemens::findOrFail($id);
        $departemen->update($request->all());
        
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('departemens.index')->with('success', 'Berhasil Memperbarui data departemen');
    }    

    public function destroy($id)
    {
        // Hapus data departemen
        $departemen = Departemens::findOrFail($id);
        $departemen->delete();
        
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('departemens.index')->with('success', 'Berhasil Menghapus data departemen');
    } 
}
