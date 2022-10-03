<?php

namespace App\Http\Controllers;

use App\Models\ships;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ships_request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use File;

use Response;


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
        $model->tipe = $request->tipe;
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
        $model->tipe = $request->tipe;
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
      
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'TIPE');
        $sheet->setCellValue('C1', 'TANGGAL DITAMBAHKAN');
        $sheet->setCellValue('D1', 'TERAKHIR DIUBAH');
        
        
        
        $query = DB::table('ships')->get(); 
        $i=2;
        $no=1;
        foreach ($query as $d=> $row){ 
        
            $sheet->setCellValue('A'.$i, $no++);
            $sheet->setCellValue('B'.$i, $row->type);
            $sheet->setCellValue('C'.$i, $row->created_at);
            $sheet->setCellValue('D'.$i, $row->updated_at);   
            $i++;
        }
        $fileName = "Master_Ship_" . date('Y-m-d').".xlsx"; 
        $writer = new Xlsx($spreadsheet);
        $writer->save($fileName);
        
        $filepath = public_path($fileName);
        return Response::download($filepath);
        

            }

}
