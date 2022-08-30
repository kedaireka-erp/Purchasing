<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $satuan = Satuan::select('*')->paginate(5);

        return view('master.satuan.dashboard', compact('satuan'));
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $satuan = Satuan::where('name', 'like', "%" . $keyword . "%")->paginate(5);
        return view('master.satuan.dashboard', compact('satuan'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function add()
    {
        return view('master.satuan.add');
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => ['required', 'unique:satuans', 'max:100'],
            'unit' => ['required', 'unique:satuans', 'max:10'],
        ]);

        Satuan::create($validatedData);
        
        return redirect('/satuan')->with('success', 'Data berhasil ditambahkan');
        
    }

    public function edit($id)
    {
        $satuan = Satuan::findOrFail($id);

        return view('master.satuan.edit', compact('satuan'));
    }

    public function update(Request $request, $id)
    {
        $satuan = Satuan::find($id);
        $satuan->name = $request->name;
        $satuan->unit = $request->unit;

        if($satuan->save())
        {
            return redirect('/satuan')->with('teredit','Berhasil Mengedit Data');
        }
        else
        {
            return redirect()->back()->with('message','Gagal Mengedit Data');
        }
    }

    public function destroy($id)
    {
        $satuan = Satuan::findOrFail($id);
        $satuan->delete();
        
        return redirect('/satuan')->with('terhapus','Berhasil Menghapus Data');
    }

}
