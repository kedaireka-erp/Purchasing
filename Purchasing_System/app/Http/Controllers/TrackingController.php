<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Grade;
use App\Models\Order;
use App\Models\ships;
use App\Models\Powder;
use App\Models\Prefix;
use App\Models\Payment;
use App\Models\location;
use App\Models\Supplier;
use App\Models\ItemRequest;
use App\Models\Timeshipping;
use Illuminate\Http\Request;
use App\Models\PurchaseRequest;
use Illuminate\Support\Facades\DB;

class TrackingController extends Controller
{
    public function indexx()
    {
        $purchase_requests = PurchaseRequest::with('Prefixe')->get();
        $time = Timeshipping::get();
        $Prefixe= Prefix::get();
        $payment = Payment::get();
        $order = Order::get();
        $items = DB::table('item_requests')
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('orders', 'orders.id', '=', 'order_id.id_request')
            ->join('items', 'items.id', '=', 'item_requests.id_item')
            ->join('satuans', 'satuans.id', '=', 'items.id_satuan')
            ->join('prefixes', 'prefixes.id', '=', 'purchase_requests.prefixes_id')
            ->join('master_items', 'master_items.id', '=', 'items.id_master_item')
            ->select('item_requests.id' ,'orders.no_po','purchase_requests.no_pr', 'purchase_requests.deadline_date','items.stok','purchase_requests.requester','prefixes.divisi','satuans.name','master_items.item_name')
            ->get();
            
        
        
        
            $purchase_requests = PurchaseRequest::get();
            $Prefixe = Prefix::get();
            

        return view('Tracking.dashboard', compact('orders','items','time','payment','purchase_requests',"Prefixe"));
    }

    
    public function index_good()
    {
        $purchase_requests = PurchaseRequest::get();
        $time = Timeshipping::get();
        $Prefixe= Prefix::get();
        $location= Location::get();
        $payment = Payment::get();
        $items = DB::table('item_requests')
            
            
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('items', 'items.id', '=', 'item_requests.id_item')
            ->join('orders', 'orders.id', '=', 'item_requests.order_id')
            // ->join('satuans', 'satuans.id', '=', 'items.id_satuan')
            ->join('prefixes', 'prefixes.id', '=', 'purchase_requests.prefixes_id')
            ->join('master_items', 'master_items.id', '=', 'items.id_master_item')
            
            ->select('item_requests.id','purchase_requests.status','orders.no_po','purchase_requests.no_pr','purchase_requests.deadline_date','purchase_requests.requester','items.outstanding','items.sudah_datang','prefixes.divisi', 'master_items.item_name')
            ->get();

        // $items=Item::has('order','purchase')->get();

            
        return view('Tracking.dashboard_good', compact('location','items','time','payment','purchase_requests',"Prefixe"));
    }

    public function index_powder()
    {
        $purchase_requests = PurchaseRequest::get();
        $time = Timeshipping::get();
        $Prefixe= Prefix::get();
        $location= Location::get();
        $payment = Payment::get();

        $powders = DB::table('item_requests')
            
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('prefixes', 'prefixes.id', '=', 'purchase_requests.prefixes_id')
            ->join('orders', 'orders.id', '=', 'item_requests.order_id')
            ->join('powders', 'powders.id', '=', 'item_requests.powder_id')
            ->join('grades', 'grades.id', '=', 'powders.grades_id')
            ->join('colours', 'colours.id', '=', 'powders.color_id')
            ->join('suppliers', 'suppliers.id', '=', 'powders.suppliers_id')
            ->select('item_requests.id','purchase_requests.status','powders.sudah_datang' ,'powders.outstanding','colours.name','orders.no_po','purchase_requests.no_pr', 'purchase_requests.deadline_date','powders.warna','purchase_requests.requester','prefixes.divisi','grades.tipe','suppliers.vendor')
            ->get();

            $Prefixe = Prefix::get();
            
            


        return view('Tracking.dashboard_powder', compact('location','powders','time','payment','purchase_requests',"Prefixe"));
    }
    public function view($id){
        $purchase_requests = PurchaseRequest::find($id);
        $item = Item::with('master_item','satuan')->get();


        $Location=location::get();
        $Ship=ships::get();
        $Prefixe=Prefix::get();
        $Grade = Grade::get();
        $Supplier = Supplier::get();

        return view('Tracking.view', compact('purchase_requests', 'Location', 'Ship', 'Prefixe','item', 'Grade', 'Supplier'));
    }

    public function detail($id)
    {
        
        // $tracking=ItemRequest::find($id);
        // dd($tracking);
        $purchase_requests = PurchaseRequest::get();
        $time = Timeshipping::get();
        $Prefixe= Prefix::get();
        $location= Location::get();
        $payment = Payment::get();
        $tracking = DB::table('item_requests')
            
            ->where('item_requests.id',$id)
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('items', 'items.id', '=', 'item_requests.id_item')
            ->join('orders', 'orders.id', '=', 'item_requests.order_id')
            ->join('satuans', 'satuans.id', '=', 'items.id_satuan')
            ->join('locations', 'locations.id', '=', 'purchase_requests.locations_id')
            ->join('ships', 'ships.id', '=', 'purchase_requests.ships_id')
            ->join('prefixes', 'prefixes.id', '=', 'purchase_requests.prefixes_id')
            ->join('master_items', 'master_items.id', '=', 'items.id_master_item')
            
            ->select('purchase_requests.status','item_requests.id_item','locations.location_name','purchase_requests.note','purchase_requests.approval_status','ships.tipe','satuans.unit','item_requests.id','orders.no_po','purchase_requests.project','purchase_requests.type','purchase_requests.no_pr','purchase_requests.created_at','purchase_requests.accept_status',
            'purchase_requests.deadline_date','purchase_requests.requester','items.outstanding','items.sudah_datang','prefixes.divisi', 'master_items.item_name')
            ->get();

        $powders = DB::table('item_requests')
            
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('prefixes', 'prefixes.id', '=', 'purchase_requests.prefixes_id')
            ->join('orders', 'orders.id', '=', 'item_requests.order_id')
            ->join('powders', 'powders.id', '=', 'item_requests.powder_id')
            ->join('grades', 'grades.id', '=', 'powders.grades_id')
            ->join('colours', 'colours.id', '=', 'powders.color_id')
            ->join('suppliers', 'suppliers.id', '=', 'powders.suppliers_id')
            ->select('item_requests.id','powders.sudah_datang' ,'powders.outstanding','colours.name','orders.no_po','purchase_requests.no_pr', 'purchase_requests.deadline_date','powders.warna','purchase_requests.requester','prefixes.divisi','grades.tipe','suppliers.vendor')
            ->get();
        return view('Tracking.view',compact('tracking','powders'));

    }

    public function detail_powders($id)
    {
        
        // $tracking=ItemRequest::find($id);
        // dd($tracking);
        $purchase_requests = PurchaseRequest::get();
        $time = Timeshipping::get();
        $Prefixe= Prefix::get();
        $location= Location::get();
        $payment = Payment::get();
       

        $powders = DB::table('item_requests')
        ->where('item_requests.id',$id)
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('prefixes', 'prefixes.id', '=', 'purchase_requests.prefixes_id')
            ->join('orders', 'orders.id', '=', 'item_requests.order_id')
            ->join('powders', 'powders.id', '=', 'item_requests.powder_id')
            ->join('grades', 'grades.id', '=', 'powders.grades_id')
            ->join('colours', 'colours.id', '=', 'powders.color_id')
            ->join('ships', 'ships.id', '=', 'purchase_requests.ships_id')
            ->join('locations', 'locations.id', '=', 'purchase_requests.locations_id')
            ->join('suppliers', 'suppliers.id', '=', 'powders.suppliers_id')
            ->select('purchase_requests.status','item_requests.powder_id','powders.finishing','powders.m2','purchase_requests.type','purchase_requests.approval_status','ships.tipe','locations.location_name','purchase_requests.note','item_requests.id','purchase_requests.project','purchase_requests.created_at','powders.sudah_datang' ,'powders.outstanding','colours.name','orders.no_po','purchase_requests.no_pr', 'purchase_requests.deadline_date','powders.warna','purchase_requests.requester','prefixes.divisi','grades.tipe','suppliers.vendor')
            ->get();
        return view('Tracking.view_powder',compact('powders'));
    }


    public function update_good(Request $request, $id)
    {
        $item =  Item::findOrFail($id);
        
        if($item->outstanding >= $request->sudah_datang) {

        $sudah_datang=$item->sudah_datang;
        $outstanding=$item->outstanding;

        $item->update([
            'sudah_datang' =>  $sudah_datang + $request->sudah_datang,
            'outstanding' =>  $outstanding - $request->sudah_datang,
            'tanggal_kedatangan_barang' => $request->tanggal_kedatangan_barang
            
        ]);
        DB::table('purchase_requests')
        ->join('item_requests', 'item_requests.id_request', '=', 'purchase_requests.id')
        ->where('id_item', $id)->update([
            'status' => $request->status,
        ]);


        return redirect('/tracking/good');
        }
        else{
            return redirect('/tracking')->with('failed', 'Barang datang melebihi jumlah outstanding');

        }
    }

    public function update_Tpowder(Request $request, $id)
    {
        
        $powder = Powder::findOrFail($id);
        if($powder->outstanding >= $request->sudah_datang) {

        $sudah_datang=$powder->sudah_datang;
        $outstanding=$powder->outstanding;

        $powder->update([
            
            'sudah_datang' =>  $sudah_datang + $request->sudah_datang,
            'outstanding' =>  $outstanding - $request->sudah_datang,
            'tanggal_kedatangan_barang' => $request->tanggal_kedatangan_barang
            
        ]);

        DB::table('purchase_requests')
        ->join('item_requests', 'item_requests.id_request', '=', 'purchase_requests.id')
        ->where('powder_id', $id)->update([
            'status' => $request->status,
        ]);

        return redirect('/tracking/powder');
        }
        else{
            return redirect('/tracking/powder')->with('failed', 'Barang datang melebihi jumlah outstanding');

        }
    }

    

}