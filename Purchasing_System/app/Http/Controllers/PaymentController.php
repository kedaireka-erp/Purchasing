<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PaymentRequest;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use File;

use Response;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->search;
        $payments = Payment::where('name', 'like', '%' .$keyword. '%')
        ->paginate(5);
        return \view('Payment.index', \compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new payment;
        return \view('Payment.create', \compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentRequest $request)
    {
        $model = new payment;
        $model->name = $request->name;
        $model->save();

        return \redirect('payment')->with('success', 'Data berhasil ditambahkan');
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
        $model = payment::find($id);
        return \view('Payment.edit', \compact('model'));
    }
 
    public function view($id)
    {
        $model = payment::find($id);
        return \view('Payment.view', \compact('model'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentRequest $request, $id)
    {
        $model = payment::find($id);
        $model->name = $request->name;
        $model->save();

        return \redirect('payment')->with('teredit', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = payment::find($id);
        $model->delete();

        return \redirect('payment')->with('terhapus','Berhasil Menghapus Data');
    }

    

    public function excel(){
        require 'C:\Users\USER\Documents\GitHub\Purchasing\Purchasing_System\vendor\autoload.php'; 

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'PEMBAYARAN');
        $sheet->setCellValue('C1', 'TANGGAL DITAMBAHKAN');
        $sheet->setCellValue('D1', 'TERAKHIR DIUBAH');
        
        
        
        $query = DB::table('payments')->get(); 
        $i=2;
        $no=1;
        foreach ($query as $d=> $row){ 
        
            $sheet->setCellValue('A'.$i, $no++);
            $sheet->setCellValue('B'.$i, $row->name);
            $sheet->setCellValue('C'.$i, $row->created_at);
            $sheet->setCellValue('D'.$i, $row->updated_at);   
            $i++;
        }
        $fileName = "Master_Payment_" . date('Y-m-d').".xlsx"; 
        $writer = new Xlsx($spreadsheet);
        $writer->save($fileName);
        
        $filepath = public_path($fileName);
        return Response::download($filepath);
        

            }
}
