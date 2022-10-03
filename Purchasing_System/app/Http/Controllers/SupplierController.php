<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SupplierRequest;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use File;

use Response;

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

        return \redirect('supplier')->with('success', 'Data berhasil ditambahkan');
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

    public function view($id)
    {
        $supplier = Supplier::find($id);
        return \view('Supplier.view', \compact('supplier'));
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

        return \redirect('supplier')->with('teredit', 'Data berhasil diedit');

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

        return \redirect('supplier') ->with('terhapus','Berhasil Menghapus Data');
    }

    

    public function excel(){
      
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'VENDOR');
        $sheet->setCellValue('C1', 'TANGGAL DITAMBAHKAN');
        $sheet->setCellValue('D1', 'TERAKHIR DIUBAH');
        
        
        
        $query = DB::table('suppliers')->get(); 
        $i=2;
        $no=1;
        foreach ($query as $d=> $row){ 
        
            $sheet->setCellValue('A'.$i, $no++);
            $sheet->setCellValue('B'.$i, $row->vendor);
            $sheet->setCellValue('C'.$i, $row->created_at);
            $sheet->setCellValue('D'.$i, $row->updated_at);   
            $i++;
        }
        $fileName = "Master_Supplier_" . date('Y-m-d').".xlsx"; 
        $writer = new Xlsx($spreadsheet);
        $writer->save($fileName);
        
        $filepath = public_path($fileName);
        return Response::download($filepath);
        

            }
}

