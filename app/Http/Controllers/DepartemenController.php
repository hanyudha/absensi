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
        $query->where('NamaDepartemen', 'like', '%' . $search . '%');            }
        $departemens = $query->paginate(5); //paginate with 10 items per page
        return view('departemens.index', compact('departemens'));
    }
                   
    public function create ()
    {
        return view('departemens.create');
    }
            
    public function store(Request $request)
    {
        //validate the request data
        $this->validate($request,[
        'NamaDepartemen'=>'required|max:225',
    ]); 
        //Create a new
        Departemens::create($request->all());
        return redirect()->route('departemens.index')->with('success','Berhasil Membuat Departemen');
    }

    public function edit($id)
    {
        $departemen = Departemens::findOrFail($id);
        return view('departemens.edit', compact('departemen'));
    }
                    
    public function update(Request$request,$id)
    {
        //validate the request data
        $this->validate($request,[
        'NamaDepartemen'=>'required|max:225',
        ]);
        //update
        $departemen = Departemens::findOrFail($id);
        $departemen->update($request->all());
        return redirect()->route('departemens.index')->with('success','Berhasil Memperbarui data departemen');
    }    

    public function destroy($id)
    {
        $departemen = Departemens::findOrFail($id);
        $departemen->delete();
        return redirect()->route('departemens.index')->with ('success','Berhasil Menghapus data departemen');
    } 
}
