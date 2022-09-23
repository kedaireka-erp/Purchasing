<?php

namespace App\Http\Controllers;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
        // Nama file excel
        $fileName = "Master_Grades_" . date('Y-m-d') . ".xls"; 
        // Nama kolom
        $fields = array("Tipe",  "Tanggal Pembuatan", "Tanggal Perubahan Data"); 
        // Menampilkan nama kolom pada baris pertama
        $excelData = implode("\t", array_values($fields)) . "\n"; 
        $query = DB::table('grades')->get(); 
            // Output setiap barisan data
            foreach ($query as $row){ 
                
                $lineData = array($row->type, $row->created_at, $row->updated_at); 
                
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
