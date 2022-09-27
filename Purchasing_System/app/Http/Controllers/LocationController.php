<?php

namespace App\Http\Controllers;

use App\Models\location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use File;

use Response;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->filled('search')) {
            $locations = Location::search($request->search)->paginate(5);
        }else{
            $locations = Location::paginate(5);
        }
        
        return view('locations.index', compact('locations'));
    }

    public function create(){

        return view('locations.create');

    }
     public function store(Request $request){

        $validateData = $request->validate([
            'location_name'=>'required|unique:locations|max:100',
            'address'=>'required',
        ], [
            'location_name.required'=>"Location name field is required.",
            'address.required'=>"Address field is required ",
        ]);

        $locations = Location::create([
            'location_name'=>$request->location_name,
            'address'=>$request->address,
        ]);

        return redirect("/location")->with('success', 'Data lokasi barang berhasil ditambahkan');
     }

     public function edit($id){

        $locations = Location::findOrFail($id);

        return view('locations.edit', compact('locations'));
     }
     public function view($id){

        $locations = Location::findOrFail($id);

        return view('locations.view', compact('locations'));
     }


     public function update(Request $request, $id){

        $locations=Location::findOrFail($id);
        $locations->update([
            'location_name'=>$request->location_name ?? $locations->location_name,
            'address'=>$request->address ?? $locations->address,
        ]);

        return redirect("/location")->with('teredit', 'Data master lokasi berhasil diedit');
     }

     public function destroy($id){

        $locations = Location::findOrFail($id);
        $locations->delete();

        return redirect("/location")->with('terhapus','Berhasil menghapus data master lokasi');
     }

    public function excel(){
        require 'C:\Users\USER\Documents\GitHub\Purchasing\Purchasing_System\vendor\autoload.php'; 

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NAMA LOKASI');
        $sheet->setCellValue('C1', 'ALAMAT');
        $sheet->setCellValue('D1', 'TANGGAL DITAMBAHKAN');
        $sheet->setCellValue('E1', 'TERAKHIR DIUBAH');
        
        
        $query = DB::table('locations')->get(); 
        $i=2;
        $no=1;
        foreach ($query as $d=> $row){ 
        
            $sheet->setCellValue('A'.$i, $no++);
            $sheet->setCellValue('B'.$i, $row->location_name);
            $sheet->setCellValue('C'.$i, $row->address);
            $sheet->setCellValue('D'.$i, $row->created_at);
            $sheet->setCellValue('E'.$i, $row->updated_at);   
            $i++;
        }
        $fileName = "Master_Location_" . date('Y-m-d').".xlsx"; 
        $writer = new Xlsx($spreadsheet);
        $writer->save($fileName);
        
        $filepath = public_path($fileName);
        return Response::download($filepath);
        

            }
}
