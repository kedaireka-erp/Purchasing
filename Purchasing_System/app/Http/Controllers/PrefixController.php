<?php

namespace App\Http\Controllers;

use App\Models\Prefix;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrefixController extends Controller
{
    public function index()
    {
        $prefix = Prefix::select('*')->latest()->paginate(5);

        return view('master.prefix.dashboard', compact('prefix'));
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $prefix = Prefix::where('divisi', 'like', "%" . $keyword . "%")->paginate(5);
        return view('master.prefix.dashboard', compact('prefix'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function add()
    {
        return view('master.prefix.add');
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'prefix' => ['required', 'unique:prefixes', 'max:10'],
            'divisi' => ['required', 'unique:prefixes', 'max:100'],
        ]);

        Prefix::create($validatedData);
        
        return redirect('/prefix')->with('success', 'Data prefix berhasil ditambahkan');
        
    }

    public function edit($id)
    {
        $prefix = Prefix::findOrFail($id);

        return view('master.prefix.edit', compact('prefix'));
    }

    public function update(Request $request, Prefix $prefix,$id)
    {
        $prefix = Prefix::find($id);

        $rules = [
            'prefix' => ['required', 'max:10'],
            'divisi' => ['required', 'max:100'],
        ];

        if($request->prefix != $prefix->prefix)
        {
            $rules['prefix'] = 'required|unique:prefixes|max:10';
            
        }
        else if($request->divisi != $prefix->divisi)
        {
            $rules['divisi'] = 'required|unique:prefixes|max:100';
        }

       $validatedData = $request->validate($rules);

       Prefix::where('id', $prefix->id)->update($validatedData);

        return redirect('/prefix')->with('teredit', 'Data berhasil diedit');
    
    }

    public function destroy($id)
    {
        $prefix = Prefix::findOrFail($id);
        $prefix->delete();
        
        return redirect('/prefix')->with('terhapus','Berhasil Menghapus Data');
    }
}
