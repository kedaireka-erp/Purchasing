<?php

namespace App\Http\Controllers;

// use App\Models\Order;
use App\Models\ItemRequest;
use App\Models\Item;
use App\Models\Order;
use App\Models\Supplier;
use App\Models\Grade;
use App\Models\location;
use App\Models\ships;
use App\Models\Prefix;
use App\Models\Powder;
use App\Models\PurchaseRequest;
use App\Models\Timeshipping;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index(){
    
    
        $orders = Order::with('location','payment','timeshipping')->get();

        return view('PO.dashboard', compact('orders'));
    }

   
    public function create(){
        $purchase_requests = PurchaseRequest::where('accept_status','accept')->get();
        $time = Timeshipping::get();
        $Prefixe= Prefix::get();
        $location= Location::get();
        $payment = Payment::get();
        $items = DB::table('item_requests')
            ->where('order_id',NULL)
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->where('purchase_requests.approval_status','approve')
            ->where('purchase_requests.accept_status','accept')
            ->join('items', 'items.id', '=', 'item_requests.id_item')
            ->join('satuans', 'satuans.id', '=', 'items.id_satuan')
            ->join('prefixes', 'prefixes.id', '=', 'purchase_requests.prefixes_id')
            ->join('master_items', 'master_items.id', '=', 'items.id_master_item')
            ->select('item_requests.id' ,'purchase_requests.no_pr', 'purchase_requests.deadline_date','items.stok','purchase_requests.requester','prefixes.divisi','satuans.name','master_items.item_name')
            ->get();

        $powders = DB::table('item_requests')
            ->where('order_id',NULL)
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('prefixes', 'prefixes.id', '=', 'purchase_requests.prefixes_id')
            ->join('powders', 'powders.id', '=', 'item_requests.powder_id')
            ->join('grades', 'grades.id', '=', 'powders.grades_id')
            ->join('suppliers', 'suppliers.id', '=', 'powders.suppliers_id')
            ->select('item_requests.id' ,'purchase_requests.no_pr', 'purchase_requests.deadline_date','powders.warna','purchase_requests.requester','prefixes.divisi','grades.type','suppliers.vendor')
            ->get();

            $Prefixe = Prefix::get();
            
            

        return view('PO.index', compact('location','powders','items','time','payment','purchase_requests',"Prefixe"));
    }
    
    

    public function store_item(Request $request)
    {
        $purchase_requests = PurchaseRequest::with('Prefixe')->get();
        
        $order = New Order;
        
        $order->supplier = $request->supplier;
        $order->nama_supplier = $request->nama_supplier;
        $order->id_waktu = $request->id_waktu;
        $order->id_pembayaran = $request->id_pembayaran;
        $order->id_alamat_kirim = $request->id_alamat_kirim;
        $order->alamat_penagihan = $request->alamat_penagihan;
        $order->lain_lain = $request->lain_lain;
        $order->note = $request->note;
        $order->signature = $request->signature;
        $order->nama = $request->nama;
        $order->save();

        $ids = $request->ids;

        

        ItemRequest::WhereIn('id', $ids)->update([
            'order_id' => $order->id

        ]);

        

        return redirect('/order');
    }

     public function item(){
        $purchase_requests = PurchaseRequest::with('Prefixe')->get();
        $time = Timeshipping::get();
        $Prefixe= Prefix::get();
        $payment = Payment::get();
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
}
