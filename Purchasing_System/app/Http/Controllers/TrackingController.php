<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\ships;
use App\Models\Prefix;
use App\Models\Payment;
use App\Models\location;
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

    
    public function index()
    {
        $purchase_requests = PurchaseRequest::get();
        $time = Timeshipping::get();
        $Prefixe= Prefix::get();
        $location= Location::get();
        $payment = Payment::get();
        $items = DB::table('item_requests')
            
            
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('items', 'items.id', '=', 'item_requests.id_item')
            // ->join('orders', 'orders.id', '=', 'item_requests.order_id')
            // ->join('satuans', 'satuans.id', '=', 'items.id_satuan')
            ->join('prefixes', 'prefixes.id', '=', 'purchase_requests.prefixes_id')
            ->join('master_items', 'master_items.id', '=', 'items.id_master_item')
            
            ->select('item_requests.id' ,'purchase_requests.no_pr', 'purchase_requests.deadline_date','items.outstanding', 'items.sudah_datang','purchase_requests.requester','prefixes.divisi','master_items.item_name')
            ->get();

        $powders = DB::table('item_requests')
            
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('prefixes', 'prefixes.id', '=', 'purchase_requests.prefixes_id')
            ->join('powders', 'powders.id', '=', 'item_requests.powder_id')
            ->join('grades', 'grades.id', '=', 'powders.grades_id')
            ->join('suppliers', 'suppliers.id', '=', 'powders.suppliers_id')
            ->select('item_requests.id' ,'purchase_requests.no_pr', 'purchase_requests.deadline_date','powders.warna','purchase_requests.requester','prefixes.divisi','grades.type','suppliers.vendor')
            ->get();

            $Prefixe = Prefix::get();
            
            


        return view('Tracking.dashboard', compact('location','powders','items','time','payment','purchase_requests',"Prefixe"));
    }
}
