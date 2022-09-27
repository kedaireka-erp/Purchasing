<?php

namespace App\Http\Controllers;

use App\Models\Prefix;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use File;

use Response;

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
    public function view($id)
    {
        $prefix = Prefix::findOrFail($id);

        return view('master.prefix.view', compact('prefix'));
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
        
        public function excel(){
            require 'C:\Users\USER\Documents\GitHub\Purchasing\Purchasing_System\vendor\autoload.php'; 
    
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            
            $sheet->setCellValue('A1', 'No');
            $sheet->setCellValue('B1', 'PREFIX');
            $sheet->setCellValue('C1', 'DIVISI');
            $sheet->setCellValue('D1', 'TANGGAL DITAMBAHKAN');
            $sheet->setCellValue('E1', 'TERAKHIR DIUBAH');
            
            
            $query = DB::table('prefixes')->get(); 
            $i=2;
            $no=1;
            foreach ($query as $d=> $row){ 
            
                $sheet->setCellValue('A'.$i, $no++);
                $sheet->setCellValue('B'.$i, $row->prefix);
                $sheet->setCellValue('C'.$i, $row->divisi);
                $sheet->setCellValue('D'.$i, $row->created_at);
                $sheet->setCellValue('E'.$i, $row->updated_at);   
                $i++;
            }
            $fileName = "Master_Prefix_" . date('Y-m-d').".xlsx"; 
            $writer = new Xlsx($spreadsheet);
            $writer->save($fileName);
            
            $filepath = public_path($fileName);
            return Response::download($filepath);
            
    
                }
}
