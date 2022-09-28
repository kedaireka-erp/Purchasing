<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use File;

use Response;

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
    
    public function view($id)
    {
        $satuan = Satuan::findOrFail($id);

        return view('master.satuan.view', compact('satuan'));
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
        require 'C:\Users\USER\Documents\GitHub\Purchasing\Purchasing_System\vendor\autoload.php'; 

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NAMA WARNA');
        $sheet->setCellValue('D1', 'TANGGAL DITAMBAHKAN');
        $sheet->setCellValue('E1', 'TERAKHIR DIUBAH');
        
        
        $query = DB::table('satuans')->get(); 
        $i=2;
        $no=1;
        foreach ($query as $d=> $row){ 
        
            $sheet->setCellValue('A'.$i, $no++);
            $sheet->setCellValue('B'.$i, $row->name);
            $sheet->setCellValue('D'.$i, $row->created_at);
            $sheet->setCellValue('E'.$i, $row->updated_at);   
            $i++;
        }
        $fileName = "Master_Color_" . date('Y-m-d').".xlsx"; 
        $writer = new Xlsx($spreadsheet);
        $writer->save($fileName);
        
        $filepath = public_path($fileName);
        return Response::download($filepath);
        

            }

}
