<?php

namespace App\Http\Controllers;

use App\Models\Master_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $items->update([
            'item_name'=> $request -> item_name,
            'stock'=> $request -> stock,
        ]);
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
        
        
        // Nama file excel
        $fileName = "Master_Item_" . date('Y-m-d') . ".xls"; 
        
        // Nama kolom
        $fields = array("Nama Barang", "Stok", "Tanggal Pembuatan", "Tanggal Perubahan Data"); 
        
        // Menampilkan nama kolom pada baris pertama
        $excelData = implode("\t", array_values($fields)) . "\n"; 
        
        
        $query = DB::table('master_items')->get(); 
        
            // Output setiap barisan data
            foreach ($query as $row){ 
                
                $lineData = array($row->item_name, $row->stock, $row->created_at, $row->updated_at); 
                
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
