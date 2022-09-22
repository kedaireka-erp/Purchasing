<?php

namespace App\Http\Controllers;

use App\Models\location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        
        
        // Nama file excel
        $fileName = "Master_Locations_" . date('Y-m-d') . ".xls"; 
        
        // Nama kolom
        $fields = array("Nama Lokasi","Alamat", "Tanggal Pembuatan", "Tanggal Perubahan Data"); 
        
        // Menampilkan nama kolom pada baris pertama
        $excelData = implode("\t", array_values($fields)) . "\n"; 
        
        
        $query = DB::table('locations')->get(); 
        
            // Output setiap barisan data
            foreach ($query as $row){ 
                
                $lineData = array($row->location_name, $row->address, $row->created_at, $row->updated_at); 
                
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
