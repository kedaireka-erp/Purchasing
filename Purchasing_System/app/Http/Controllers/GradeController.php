<?php

namespace App\Http\Controllers;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{

   #Tampilan Dashboard Master Grade
    public function index()
    {
        $grade = Grade::get();
        return \view('Grade.index', \compact('grade'));
    }

     #Tampilan Create Master Grade
    public function create(){
        $grade = new Grade;
        return \view('Grade.create', \compact('grade'));
    }

    #Simpan data Master Grade
    public function store(Request $request){
        $grade = new grade;
        $grade->type = $request->type;
        $grade->save();
        return \redirect('grade');
    }
   
    #Fungsi Edit Master Grade
     public function edit($id){
        $grade = Grade::find($id);
        return \view('grade.edit', \compact('grade'));
    }

    #Simpan perubahan Master Grade
    public function update(Request $request, $id){
        $grade = Grade::find($id);
        $grade->type = $request->type;
        $grade->save();
        return \redirect('grade');
    }

    #Simpan perubahan Master Grade
    public function destroy($id){
        $grade = Grade::find($id);
        $grade->delete();
        return \redirect('grade');
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
