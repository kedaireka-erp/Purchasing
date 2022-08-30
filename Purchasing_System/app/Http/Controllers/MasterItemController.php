<?php

namespace App\Http\Controllers;

use App\Models\Master_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterItemController extends Controller
{
    public function index(){
    	$items = DB::table('master_items')->paginate(5);
        
 
    	return view('index', ['items' => $items]);
        
    }
    public function create(){
        return view ("create");
    }

    public function store(request $request){
        $validated = $request->validate([
            // 'title' => 'required|unique:posts|max:255',
            // 'body' => 'required',
            'item_name' => 'required|unique:master_items|max:8'
        ]);
        
        DB::table('master_items')->insert([
			'item_name' => $request->item_name,
			
		]);
		
		return redirect('/');
    }

    public function update(request $request){
    $validated = $request->validate([
    'item_name' => 'required|unique:master_items|max:8'
    ]);

    DB::table('master_items')->where('id_master_item',$request->id_master_item)->update([
		'item_name' => $request->item_name,
		
	]);
   

	
	return redirect('/');
    }
    
    Public function edit($id){
        
        //$items= Master_Item::FindorFail($id);
        $items = DB::table('master_items')->where('id_master_item',$id)->get();;
        return view ('edit',['items' => $items]);
        
    }

    public function delete($id)
{
	DB::table('master_items')->where('id_master_item',$id)->delete();
		
	return redirect('/');
}
    public function cari(Request $request)
	{
		
		$search = $request->search;
 
    	
		$items= DB::table('master_items')
		->where('item_name','like',"%".$search."%")
		->paginate(5);
 
    		
		return view('index',['items' => $items]);
 
	}

}
