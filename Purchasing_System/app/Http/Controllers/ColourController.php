<?php

namespace App\Http\Controllers;

use App\Models\Colour;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ColourController extends Controller
{
    public function index()
    {
        $colour = Colour::get();

        return \view('master.colour.index', compact('colour'));
    }

    public function create()
    {
        $colour = new Colour;

        return \view('master.colour.add', compact('colour'));
    }

    public function store(Request $request)
    {
        $colour = new Colour;
        $colour->name = $request->name;
        $colour->save();

        return \redirect('/colour');
    }

    public function edit($id)
    {
        $colour = Colour::find($id);
        
        return \view('master.colour.edit', compact('colour'));
    } 
    public function view($id)
    {
        $colour = Colour::find($id);
        
        return \view('master.colour.view', compact('colour'));
    } 

    public function update(Request $request, $id)
    {
        $colour = Colour::find($id);

        $colour->update([
            'name' => $request->name
        ]);

        return \redirect('/colour');
    }

    public function destroy($id)
    {
        $colour = Colour::find($id);
        $colour->delete();

        return \redirect('/colour');
    }

    public function excel(){
        

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NAMA');
        $sheet->setCellValue('C1', 'UNIT');
        $sheet->setCellValue('D1', 'TANGGAL DITAMBAHKAN');
        $sheet->setCellValue('E1', 'TERAKHIR DIUBAH');
        
        
        $query = DB::table('satuans')->get(); 
        $i=2;
        $no=1;
        foreach ($query as $d=> $row){ 
        
            $sheet->setCellValue('A'.$i, $no++);
            $sheet->setCellValue('B'.$i, $row->name);
            $sheet->setCellValue('C'.$i, $row->unit);
            $sheet->setCellValue('D'.$i, $row->created_at);
            $sheet->setCellValue('E'.$i, $row->updated_at);   
            $i++;
        }
        $fileName = "Master_Satuan_" . date('Y-m-d').".xlsx"; 
        $writer = new Xlsx($spreadsheet);
        $writer->save($fileName);
        
        $filepath = public_path($fileName);
        return Response::download($filepath);
        

            }

}
