<?php

namespace App\Http\Controllers;

use App\Models\Master_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use File;

use Response;



class MasterItemController extends Controller
{
    public function index(){
    	$items = DB::table('master_items')->paginate(5);
    	return view('master_item.index', ['items' => $items]);
    }
    

    public function cari(Request $request)
	{
		$search = $request->search;
		$items= DB::table('master_items')
		->where('item_name','like',"%".$search."%")->paginate(5);
 
		return view('master_item.index',['items' => $items]);
	}

    public function create(){
        return view ("master_item.create");
    }

    public function store(request $request){
        $validated = $request->validate([
            'item_name' => 'required|unique:master_items|max:100',
            'stock' => 'required|max:8'
        ]);
        // DB::table('master_items')->insert([
		// 	'item_name' => $request->item_name,
        //     'stock' => $request->stock
		// ]);
        Master_Item::create($validated);
		
		return redirect('/masteritem')->with('success', 'Data master barang berhasil ditambahkan');
    }

    // public function update(request $request, master_item $items, $id){
        public function update(Request $request, $id){

        // $items = Master_Item::find($request->id_master_item);

        $items = DB::table('master_items')->where('id',$id)->get();

        $items = New Master_Item;
        $items->item_name = $request->item_name;
        $items->stock =$request->stock;
        // $items->update([
        //     'item_name'=> $request -> item_name,
        //     'stock'=> $request -> stock,
        // ]);
        // if($request->item_name == $items->item_name)
        // {
        //     $validated = $request->validate([
        //         'stock' => 'required',
        //     'item_name' => 'required|max:100',
            
        //     ]);
        // }
        // else {
        //     $validated = $request->validate([
        //         'stock' => 'required',
        //     'item_name' => 'required|unique:master_items|max:100',
            
        //     ]);

        // }
    

    // DB::table('master_items')->where('id',$request->id_master_item)->update([
	// 	'item_name' => $request->item_name,
    //     'stock' => $request->stock

		
	// ]);
    // Master_Item::where('id',$request->id_master_item)->update($validated);

	
	return redirect('/masteritem')->with('teredit', 'Data master barang berhasil diedit');
    }
    
    Public function edit($id){
        
        // $items= Master_Item::findOrFail($id);
        $items = DB::table('master_items')->where('id',$id)->get();
        return view ('master_item.edit',['items' => $items]);
        // dd($items);
        
    }
    public function view($id){

        // $items = DB::findOrFail($id);
        $items = DB::table('master_items')->where('id',$id)->get();
        return view('master_item.view', compact('items'));
     }

    public function delete($id)
    {
	DB::table('master_items')->where('id',$id)->delete();
		
	return redirect('/masteritem')->with('terhapus','Berhasil menghapus data master barang');
    }

    

    public function excel(){
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NAMA BARANG');
        $sheet->setCellValue('C1', 'STOK');
        $sheet->setCellValue('D1', 'TANGGAL DITAMBAHKAN');
        $sheet->setCellValue('E1', 'TERAKHIR DIUBAH');
        
        //Sheet style top
        $sheet->getStyle('A1')->getBorders()->getTop()
        ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
        $sheet->getStyle('B1')->getBorders()->getTop()
        ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
        $sheet->getStyle('C1')->getBorders()->getTop()
        ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
        $sheet->getStyle('D1')->getBorders()->getTop()
        ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
        $sheet->getStyle('E1')->getBorders()->getTop()
        ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

        //Sheet style left
        $sheet->getStyle('A1')->getBorders()->getLeft()
        ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

        //sheet style right
        $sheet->getStyle('E1')->getBorders()->getRight()
        ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
        
        $query = DB::table('master_items')->get(); 
        $i=2;
        $no=1;
        $counter=1;
        foreach ($query as  $row){ 
            
            $sheet->setCellValue('A'.$i, $no++);
            $sheet->setCellValue('B'.$i, $row->item_name);
            $sheet->setCellValue('C'.$i, $row->stock);
            $sheet->setCellValue('D'.$i, $row->created_at);
            $sheet->setCellValue('E'.$i, $row->updated_at);   
             if ($counter == count( $query )){
            //Sheet style left
            $sheet->getStyle('A'.$i)->getBorders()->getLeft()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
            //Sheet style right
            $sheet->getStyle('E'.$i)->getBorders()->getRight()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
            //Sheet style bottom
            $sheet->getStyle('A'.$i)->getBorders()->getBottom()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
            $sheet->getStyle('B'.$i)->getBorders()->getBottom()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
            $sheet->getStyle('C'.$i)->getBorders()->getBottom()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
            $sheet->getStyle('D'.$i)->getBorders()->getBottom()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
            $sheet->getStyle('E'.$i)->getBorders()->getBottom()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
            }
            else{

            //Sheet style left
            $sheet->getStyle('A'.$i)->getBorders()->getLeft()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
            //Sheet style right
            $sheet->getStyle('E'.$i)->getBorders()->getRight()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
            }
            $counter = $counter + 1;
    $i++;
        }
        $fileName = "Master_Item_" . date('Y-m-d').".xlsx"; 
        $writer = new Xlsx($spreadsheet);
        $writer->save($fileName);
        
        $filepath = public_path($fileName);
        return Response::download($filepath);
        

            }
}
