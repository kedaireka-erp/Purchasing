<?php

namespace App\Http\Controllers;

// use App\Models\Order;
use Carbon\Carbon;
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
use App\Http\Requests\OrderRequest;

use PDF;

class OrderController extends Controller
{
    public function index(){
    
    
        $orders = Order::with('location','payment','timeshipping','supplier','purchases')->get();

        return view('PO.dashboard', compact('orders'));
    }

   
    public function create(){
        $purchase_requests = PurchaseRequest::where('accept_status','accept')->get();
        $time = Timeshipping::get();
        $Prefixe= Prefix::get();
        $location= Location::get();
        $payment = Payment::get();
        $supplier = Supplier::get();
        $items = DB::table('item_requests')
            ->where('order_id',NULL)
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->where('purchase_requests.approval_status','approve')
            ->where('purchase_requests.accept_status','accept')
            ->join('items', 'items.id', '=', 'item_requests.id_item')
            ->join('satuans', 'satuans.id', '=', 'items.id_satuan')
            ->join('prefixes', 'prefixes.id', '=', 'purchase_requests.prefixes_id')
            ->join('master_items', 'master_items.id', '=', 'items.id_master_item')
            ->select('item_requests.id','purchase_requests.approval_status','purchase_requests.accept_status' ,'purchase_requests.no_pr', 'purchase_requests.deadline_date','items.stok','purchase_requests.requester','prefixes.divisi','satuans.name','master_items.item_name')
            ->get();

        $powders = DB::table('item_requests')
            ->where('order_id',NULL)
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('prefixes', 'prefixes.id', '=', 'purchase_requests.prefixes_id')
            ->join('powders', 'powders.id', '=', 'item_requests.powder_id')
            ->join('grades', 'grades.id', '=', 'powders.grades_id')
            ->join('suppliers', 'suppliers.id', '=', 'powders.suppliers_id')
            ->select('item_requests.id','purchase_requests.approval_status','purchase_requests.accept_status'  ,'purchase_requests.no_pr', 'purchase_requests.deadline_date','powders.warna','purchase_requests.requester','prefixes.divisi','grades.tipe','suppliers.vendor')
            ->get();

            $Prefixe = Prefix::get();
            
            

        return view('PO.index', compact('supplier','location','powders','items','time','payment','purchase_requests',"Prefixe"));
    }
    
    public function read_time(){
        $time = Timeshipping::get();

        return view('PO.time.read', compact('time'));
    }

    public function create_date(){
        
        return view('PO.time.date');
    }

    public function read_supplier(){
        $supplier = Supplier::get();

        return view('PO.supplier.read', compact('supplier'));
    }

    public function create_supplier(){
        return view('PO.supplier.add');
    }

    public function create_time(){
        return view('PO.time.add');
    }

    public function store_supplier(Request $request){
        $Supplier = Supplier::create([
            'vendor' => $request->vendor,
        ]);

        return redirect('/order/create');
    }

    public function store_time(Request $request){
        $time = Timeshipping::create([
            'name_time' => $request->name_time,
        ]);

        return redirect('/order/create');
    }

    public function read_location(){
        $location = Location::get();

        return view('PO.location.read', compact('location'));
    }

    public function create_location(){
        return view('PO.location.add');
    }

    public function store_location(Request $request)
    {
        

        $location = Location::create([
            'location_name' => $request->location_name,
            'address' => $request->address
        ]);

        return redirect('/order/create');
    }

    public function read_payment(){
        $payment = Payment::get();

        return view('PO.payment.read', compact('payment'));
    }

    public function create_payment(){
        return view('PO.payment.add');
    }

    public function store_payment(Request $request)
    {
        
        $payment = Payment::create([
            'name_payment' => $request->name_payment,
        ]);

        return redirect('/order/create');
    }

    public function store_item(OrderRequest $request)
    {
        $purchase_requests = PurchaseRequest::with('Prefixe')->get();
        
        $order = New Order;
        $order->tanggal_kirim = $request->tanggal_kirim;
        $order->nama_supplier = $request->nama_supplier;
        $order->id_supplier = $request->id_supplier;
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

        

        ItemRequest::Where('id', $ids)->update([
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

    public function view($id){

         $orders =Order::has('purchases')
         ->with('payment','timeshipping','location')
         ->find($id);
         


        //  dd($orders);

        return view('PO.view', compact('orders'));
    }

    public function destroy($id){

        $orders = Order::findOrFail($id);
        $orders->delete();

        return redirect("/order");
     }

     public function exportPDF($id) {
       
        // $items = Item::all();
       

    $orders = Order::has('purchases')
         ->with('payment','timeshipping','location')
         ->find($id);
         $tracking = DB::table('item_requests')
            
         ->where('item_requests.order_id',$id)
         ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
         ->join('items', 'items.id', '=', 'item_requests.id_item')
         ->join('orders', 'orders.id', '=', 'item_requests.order_id')
         ->join('satuans', 'satuans.id', '=', 'items.id_satuan')
         ->join('locations', 'locations.id', '=', 'purchase_requests.locations_id')
         ->join('ships', 'ships.id', '=', 'purchase_requests.ships_id')
         ->join('prefixes', 'prefixes.id', '=', 'purchase_requests.prefixes_id')
         ->join('master_items', 'master_items.id', '=', 'items.id_master_item')
         ->select('item_requests.id_item','locations.location_name','purchase_requests.note','purchase_requests.approval_status','ships.tipe','satuans.unit','item_requests.id','orders.no_po','purchase_requests.project','purchase_requests.type','purchase_requests.no_pr','purchase_requests.created_at','purchase_requests.accept_status',
         'purchase_requests.deadline_date','purchase_requests.requester','items.outstanding','items.sudah_datang','prefixes.divisi', 'master_items.item_name')
         ->get();

         $powders = DB::table('item_requests')
            ->where('item_requests.order_id',$id)
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('prefixes', 'prefixes.id', '=', 'purchase_requests.prefixes_id')
            ->join('orders', 'orders.id', '=', 'item_requests.order_id')
            ->join('powders', 'powders.id', '=', 'item_requests.powder_id')
            ->join('grades', 'grades.id', '=', 'powders.grades_id')
            ->join('colours', 'colours.id', '=', 'powders.color_id')
            ->join('suppliers', 'suppliers.id', '=', 'powders.suppliers_id')
            ->select('item_requests.id','colours.name','orders.no_po','purchase_requests.no_pr', 'purchase_requests.deadline_date','powders.quantity','powders.warna','powders.m2','powders.sudah_datang' ,'purchase_requests.requester','prefixes.divisi','grades.tipe','suppliers.vendor')
            ->get();

         $purchase = DB::table('purchase_requests')
         ->join('item_requests','item_requests.id_request', '=', 'purchase_requests.id')->where('item_requests.order_id',$id)->get('purchase_requests.type');
    
  
        // $pdf = PDF::loadView('PO.notaPO', compact('orders','tracking','purchase'))->setOptions(['defaultFont' => 'times-new-roman']);

        return view('PO.formatPO', compact('orders','tracking','powders','purchase'));
        
        // return $pdf->stream('Item.pdf');
        
      }
}
