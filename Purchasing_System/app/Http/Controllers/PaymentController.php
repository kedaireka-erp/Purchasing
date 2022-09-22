<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PaymentRequest;

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

        return \redirect('payment');
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

        return \redirect('payment');
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

        return \redirect('payment');
    }

    public function excel(){
        
        
        // Nama file excel
        $fileName = "Master_Supplier_" . date('Y-m-d') . ".xls"; 
        
        // Nama kolom
        $fields = array("Pembayaran",  "Tanggal Pembuatan", "Tanggal Perubahan Data"); 
        
        // Menampilkan nama kolom pada baris pertama
        $excelData = implode("\t", array_values($fields)) . "\n"; 
        
        
        $query = DB::table('payments')->get(); 
        
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
