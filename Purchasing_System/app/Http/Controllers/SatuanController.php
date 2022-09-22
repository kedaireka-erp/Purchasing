<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SatuanController extends Controller
{
    public function index()
    {
        $satuan = Satuan::select('*')->latest()->paginate(5);

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

    public function update(Request $request, Satuan $satuan,$id)
    {
        $satuan = Satuan::find($id);

        $rules = [
            'name' => ['required', 'max:100'],
            'unit' => ['required', 'max:10'],
        ];

        if($request->name != $satuan->name)
        {
            $rules['name'] = 'required|unique:satuans|max:100';
            
        }
        else if($request->unit != $satuan->unit)
        {
            $rules['unit'] = 'required|unique:satuans|max:10';
        }

       $validatedData = $request->validate($rules);

       Satuan::where('id', $satuan->id)->update($validatedData);

        return redirect('/satuan')->with('teredit', 'Data berhasil diedit');
    
    }

    public function destroy($id)
    {
        $satuan = Satuan::findOrFail($id);
        $satuan->delete();
        
        return redirect('/satuan')->with('terhapus','Berhasil Menghapus Data');
    }
    public function excel(){
        
        
        // Nama file excel
        $fileName = "Master_Satuan_" . date('Y-m-d') . ".xls"; 
        
        // Nama kolom
        $fields = array("Nama","Unit", "Tanggal Pembuatan", "Tanggal Perubahan Data"); 
        
        // Menampilkan nama kolom pada baris pertama
        $excelData = implode("\t", array_values($fields)) . "\n"; 
        
        
        $query = DB::table('satuans')->get(); 
        
            // Output setiap barisan data
            foreach ($query as $row){ 
                
                $lineData = array($row->name, $row->unit, $row->created_at, $row->updated_at); 
                
                $excelData .= implode("\t", array_values($lineData)) . "\n"; 
            } 
        
        
        // Headers download 
        header("Content-Type:application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$fileName\""); 
        
        // Render data excel
        echo $excelData; 
    
        exit;
            }

}
