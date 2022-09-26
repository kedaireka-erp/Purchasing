<?php

namespace App\Http\Controllers;

use App\Models\Timeshipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimeshippingController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->search;
        $timeshipping = Timeshipping::where('name', 'like', '%' .$keyword. '%')
        ->paginate(5);
        return \view('Timeshipping.index', \compact('timeshipping'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $timeshipping = new Timeshipping;
        return \view('Timeshipping.create', \compact('timeshipping'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $timeshipping = new Timeshipping;
        $timeshipping->name = $request->name;
        $timeshipping->save();

        return \redirect('timeshipping')->with('success', 'Data berhasil ditambahkan');
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
        $timeshipping = Timeshipping::find($id);
        return \view('Timeshipping.edit', \compact('timeshipping'));
    }
    public function view($id)
    {
        $timeshipping = Timeshipping::find($id);

        

        return \view('Timeshipping.view', \compact('timeshipping'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $timeshipping = Timeshipping::find($id);
        $timeshipping->name = $request->name;
        $timeshipping->save();

        return \redirect('timeshipping')->with('teredit', 'Data berhasil diedit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timeshipping = Timeshipping::find($id);
        $timeshipping->delete();

        return \redirect('timeshipping')->with('terhapus','Berhasil Menghapus Data');
    }

    public function excel(){
        
        
        // Nama file excel
        $fileName = "Master_TimeShippings_" . date('Y-m-d') . ".xls"; 
        
        // Nama kolom
        $fields = array("Nama",  "Tanggal Pembuatan", "Tanggal Perubahan Data"); 
        
        // Menampilkan nama kolom pada baris pertama
        $excelData = implode("\t", array_values($fields)) . "\n"; 
        
        
        $query = DB::table('timeshippings')->get(); 
        
            // Output setiap barisan data
            foreach ($query as $row){ 
                
                $lineData = array($row->name, $row->created_at, $row->updated_at); 
                
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
