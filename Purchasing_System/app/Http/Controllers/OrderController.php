<?php

namespace App\Http\Controllers;

// use App\Models\Order;
use App\Models\ItemRequest;
use App\Models\Item;
use App\Models\Order;
use App\Models\Location;
use App\Models\ships;
use App\Models\Prefix;
use App\Models\PurchaseRequest;
use App\Models\Timeshipping;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index(){
    //     $orders = Order::get();
    //     $time = Timeshipping::get();
    //     $payment = Payment::get();

    //     $items = Item::with('master_item','satuan')->get();

    //    $purchase_requests = PurchaseRequest::with('Prefixe')->get();
    $purchase_requests = PurchaseRequest::has('order')->get();
    $items = Item::with('master_item','satuan')->get();

    $Location=location::get();
    $Ship=ships::get();
    $Prefixe=Prefix::get();


        return view('PO.dashboard', compact('items','purchase_requests','Location','Ship','Prefixe'));
    }

    public function create(){
        $purchase_requests = PurchaseRequest::with('Prefixe')->get();
        $time = Timeshipping::get();
        $Prefixe= Prefix::get();
        $payment = Payment::get();
        $items = DB::table('item_requests')
            ->where('order_id',NULL)
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('items', 'items.id', '=', 'item_requests.id_item')
            ->join('satuans', 'satuans.id', '=', 'items.id_satuan')
            ->join('prefixes', 'prefixes.id', '=', 'purchase_requests.prefixes_id')
            ->join('master_items', 'master_items.id', '=', 'items.id_master_item')
            ->select('item_requests.id' ,'purchase_requests.no_pr', 'purchase_requests.deadline_date','items.stok','purchase_requests.requester','prefixes.divisi','satuans.name','master_items.item_name')
            ->get();
            
        
        
        
            $purchase_requests = PurchaseRequest::get();
            $Prefixe = Prefix::get();
            

        return view('PO.index', compact('items','time','payment','purchase_requests',"Prefixe"));
    }
    
    

    public function store_item(Request $request)
    {
        $purchase_requests = PurchaseRequest::with('Prefixe')->get();
        
        $order = New Order;
        
        $order->supplier = $request->supplier;
        $order->nama_supplier = $request->nama_supplier;
        $order->id_waktu = $request->id_waktu;
        $order->id_pembayaran = $request->id_pembayaran;
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
}
