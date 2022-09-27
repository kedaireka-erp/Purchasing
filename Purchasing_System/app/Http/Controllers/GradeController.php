<?php

namespace App\Http\Controllers;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use File;

use Response;

class GradeController extends Controller
{

   #Tampilan Dashboard Master Grade
    public function index()
    {
        $grade = Grade::select('*')->latest()->get();
        return view('Grade.index', compact('grade'));
    }

     #Tampilan Create Master Grade
    public function create(){
        $grade = new Grade;
        return \view('Grade.create', \compact('grade'));
    }

    #Simpan data Master Grade
    public function store(Request $request){
   
        $grade = new Grade;
        $grade->type = $request->type;
        $grade->grade_powder = $request->grade_powder;
        $grade->sieve_no_all = $request->sieve_no_all;
        $grade->sieve_no_half = $request->sieve_no_half;
        $grade->note = $request->note;
        $grade->save();
        return \redirect('grade')->with('success', 'Data berhasil ditambahkan');
    }
   
    #Fungsi Edit Master Grade
     public function edit($id){
        $grade = Grade::find($id);
        return \view('grade.edit', \compact('grade'));
    }
    public function view($id){
        $grade = Grade::find($id);
        return \view('grade.form', \compact('grade'));
    }

    #Simpan perubahan Master Grade
    public function update(Request $request, $id){
        $grade = Grade::find($id);
        $grade->type = $request->type;
        $grade->save();
        return \redirect('grade')->with('teredit', 'Data berhasil diedit');
    }

    #Simpan perubahan Master Grade
    public function destroy($id){
        $grade = Grade::find($id);
        $grade->delete();
        return \redirect('grade')->with('terhapus','Berhasil Menghapus Data');
    }

    #Export Excel

    public function excel(){
        require 'C:\Users\USER\Documents\GitHub\Purchasing\Purchasing_System\vendor\autoload.php'; 

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'TIPE');
        $sheet->setCellValue('C1', 'TANGGAL DITAMBAHKAN');
        $sheet->setCellValue('D1', 'TERAKHIR DIUBAH');
        
        
        
        $query = DB::table('grades')->get(); 
        $i=2;
        $no=1;
        foreach ($query as $d=> $row){ 
        
            $sheet->setCellValue('A'.$i, $no++);
            $sheet->setCellValue('B'.$i, $row->type);
            $sheet->setCellValue('C'.$i, $row->created_at);
            $sheet->setCellValue('D'.$i, $row->updated_at);   
            $i++;
        }
        $fileName = "Master_Grade_" . date('Y-m-d').".xlsx"; 
        $writer = new Xlsx($spreadsheet);
        $writer->save($fileName);
        
        $filepath = public_path($fileName);
        return Response::download($filepath);
        

            }
}
