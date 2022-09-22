<?php

namespace App\Http\Controllers;

use App\Models\ships;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ships_request;


class ships_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->search;
        //$datas = ships::all();
        $datas = ships::where('type', 'LIKE', '%' .$keyword. '%')
        ->paginate(5);
        return \view('ships.index', \compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new ships;
        return \view('ships.create', \compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ships_request $request)
    {
        $model = new ships;
        $model->type = $request->type;
        $model->save();

        return \redirect('ships')->with('success', 'Data kebutuhan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = ships::find($id);
        return \view('ships.edit', \compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ships_request $request, $id)
    {
        $model = ships::find($id);
        $model->type = $request->type;
        $model->save();

        return \redirect('ships')->with('teredit', 'Data kebutuhan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = ships::find($id);
        $model->delete();
        return
        \redirect('ships')->with('terhapus','Berhasil menghapus data kebutuhan');
    }

    public function excel(){
        
        
        // Nama file excel
        $fileName = "Master_Ships_" . date('Y-m-d') . ".xls"; 
        
        // Nama kolom
        $fields = array("Tipe",  "Tanggal Pembuatan", "Tanggal Perubahan Data"); 
        
        // Menampilkan nama kolom pada baris pertama
        $excelData = implode("\t", array_values($fields)) . "\n"; 
        
        
        $query = DB::table('ships')->get(); 
        
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
