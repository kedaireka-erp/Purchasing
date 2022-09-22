<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SupplierRequest;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->search;
        $supplier = Supplier::where('vendor', 'like', '%' .$keyword. '%')
        ->paginate(5);
        return \view('Supplier.index', \compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = new Supplier;
        return \view('Supplier.create', \compact('supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier = new Supplier;
        $supplier->vendor = $request->vendor;
        $supplier->save();

        return \redirect('supplier');
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
        $supplier = Supplier::find($id);
        return \view('Supplier.edit', \compact('supplier'));
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
        $supplier = Supplier::find($id);
        $supplier->vendor = $request->vendor;
        $supplier->save();

        return \redirect('supplier');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return \redirect('supplier');
    }

    public function excel(){
        
        
        // Nama file excel
        $fileName = "Master_Supplier_" . date('Y-m-d') . ".xls"; 
        
        // Nama kolom
        $fields = array("Vendor",  "Tanggal Pembuatan", "Tanggal Perubahan Data"); 
        
        // Menampilkan nama kolom pada baris pertama
        $excelData = implode("\t", array_values($fields)) . "\n"; 
        
        
        $query = DB::table('suppliers')->get(); 
        
            // Output setiap barisan data
            foreach ($query as $row){ 
                
                $lineData = array($row->vendor, $row->created_at, $row->updated_at); 
                
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

