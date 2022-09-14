<?php

namespace App\Http\Controllers;

use App\Models\location;
use App\Models\Prefix;
use App\Models\PurchaseRequest;
use App\Models\ships;
use App\Models\Master_Item;
use App\Models\Satuan;
use App\Models\Item;
use App\Models\ItemRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.dashboard');
    }
    
    public function coba()
    {
        return view('purchase.Othergood');
    }
    public function approval()
    {
        $purchase_requests=PurchaseRequest::paginate(5);
        return view('Approval.dashboard',compact("purchase_requests"));
    }

    public function view($id){
        $purchase_requests = PurchaseRequest::find($id);
        $item = Item::with('master_item','satuan')->get();

        // $item = DB::table('items')
        //         ->join('purchase_requests', 'id_request', '=', 'purchase_requests.id')
        //         ->join('master_items', 'id_master_item', '=', 'master_items.id')
        //         ->join('satuans', 'id_satuan', '=', 'satuans.id')
        //         ->select('items.*', 'master_items.item_name','satuans.unit')
        //         ->get();

        $Location=location::get();
        $Ship=ships::get();
        $Prefixe=Prefix::get();

        return view('Approval.view', compact('purchase_requests', 'Location', 'Ship', 'Prefixe','item'));
    }

    public function edit($id){
        $purchase_requests = PurchaseRequest::findOrFail($id);

        $item = DB::table('items')
                ->join('purchase_requests', 'id_request', '=', 'purchase_requests.id')
                ->join('master_items', 'id_master_item', '=', 'master_items.id')
                ->join('satuans', 'id_satuan', '=', 'satuans.id')
                ->select('items.*', 'master_items.item_name','satuans.unit')
                ->get();

        $Location=location::get();
        $Ship=ships::get();
        $Prefixe=Prefix::get();

        return view('approval.edit', compact('purchase_requests', 'item','Location', 'Ship', 'Prefixe'));
    }

    public function update(request $request, $id){
        //perlu diubah

    DB::table('purchase_requests')-> where('id',$id)->update([
		'approval_status' => $request->approval_status,
		
	]);

    $purchase_requests=PurchaseRequest::paginate(5);
        return redirect('approval');
}
public function delete($id)
{
	DB::table('purchase_requests')->where('id',$id)->delete();
		
	return redirect('approval')->with('terhapus','Berhasil purchasing request');
}
}