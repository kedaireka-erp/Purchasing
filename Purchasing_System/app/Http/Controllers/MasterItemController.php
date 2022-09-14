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
        DB::table('master_items')->insert([
			'item_name' => $request->item_name,
            'stock' => $request->stock
		]);
		
		return redirect('/masteritem')->with('success', 'Data master barang berhasil ditambahkan');
    }

    public function update(request $request, master_item $items){

        $items = master_item::find($request->id_master_item);

        if($request->item_name == $items->item_name)
        {
            $validated = $request->validate([
                'stock' => 'required',
            'item_name' => 'required|max:100',
            
            ]);
        }
        else {
            $validated = $request->validate([
                'stock' => 'required',
            'item_name' => 'required|unique:master_items|max:100',
            
            ]);

        }
    

    DB::table('master_items')->where('id',$request->id_master_item)->update([
		'item_name' => $request->item_name,
        'stock' => $request->stock
		
	]);
   

	
	return redirect('/masteritem')->with('teredit', 'Data master barang berhasil diedit');
    }
    
    Public function edit($id){
        
        //$items= Master_Item::FindorFail($id);
        $items = DB::table('master_items')->where('id',$id)->get();;
        return view ('master_item.edit',['items' => $items]);
        
    }

    public function delete($id)
    {
	DB::table('master_items')->where('id',$id)->delete();
		
	return redirect('/masteritem')->with('terhapus','Berhasil menghapus data master barang');
    }

}
