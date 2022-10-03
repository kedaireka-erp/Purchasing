<?php

namespace App\Http\Controllers;

use App\Models\Timeshipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use File;

use Response;

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
        $timeshipping = Timeshipping::where('name_time', 'like', '%' .$keyword. '%')
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
        $timeshipping->name_time = $request->name_time;
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
        $timeshipping->name_time = $request->name_time;
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
        require 'C:\Users\USER\Documents\GitHub\Purchasing\Purchasing_System\vendor\autoload.php'; 

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NAMA');
        $sheet->setCellValue('C1', 'TANGGAL DITAMBAHKAN');
        $sheet->setCellValue('D1', 'TERAKHIR DIUBAH');
        
        
        
        $query = DB::table('timeshippings')->get(); 
        $i=2;
        $no=1;
        foreach ($query as $d=> $row){ 
        
            $sheet->setCellValue('A'.$i, $no++);
            $sheet->setCellValue('B'.$i, $row->name_time);
            $sheet->setCellValue('C'.$i, $row->created_at);
            $sheet->setCellValue('D'.$i, $row->updated_at);   
            $i++;
        }
        $fileName = "Master_TimeShippings_" . date('Y-m-d').".xlsx"; 
        $writer = new Xlsx($spreadsheet);
        $writer->save($fileName);
        
        $filepath = public_path($fileName);
        return Response::download($filepath);
        

            }
}
