<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Grade;
use App\Models\Order;
use App\Models\ships;
use App\Models\Colour;
use App\Models\Powder;
use App\Models\Prefix;
use App\Models\Satuan;
use App\Models\location;
use App\Models\Supplier;
use App\Models\ItemRequest;
use App\Models\Master_Item;
use Illuminate\Http\Request;
use App\Models\PurchaseRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function profile()
    {
        return view('home.profile');
    }
    public function index()
    {
        $purchase = DB::table('purchase_requests')->count();
        $orders = DB::table('orders')->count();

        $x = DB::table('purchase_requests')
                    ->where('approval_status','pending')
                    ->orWhere('accept_status','pending')
                    ->count();

        $y = DB::table('purchase_requests')
                    ->where('approval_status','reject')
                    ->count();

        $z = DB::table('purchase_requests')
                    ->where('accept_status','reject')
                    ->count();

        $pending = $x + $y + $z;

        $done = DB::table('purchase_requests')
                    ->where('accept_status','accept')
                    ->orWhere('accept_status','edit')
                    ->count();

        $jmlpowder = DB::table('powders')->count();
        $jmlother = DB::table('items')->count();

        $purchase_tabel = PurchaseRequest::latest()->paginate(3);
        
        $purchase_tabel = DB::table('purchase_requests')
                                ->join('prefixes','purchase_requests.prefixes_id','=','prefixes.id')
                                ->select('prefixes.divisi','purchase_requests.*')
                                ->latest()
                                ->paginate(3);

        return view('home.dashboard',compact('purchase','orders','pending','done','jmlpowder','jmlother','purchase_tabel'));
    }

    public function index_sales()
    {
        $purchase = PurchaseRequest::where('role','sales')->count();
        $orders = DB::table('item_requests')
            ->where('purchase_requests.role','=','sales')
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('orders', 'orders.id', '=', 'item_requests.order_id')
            ->count();
        $pending=PurchaseRequest::where('approval_status','pending')->where('role','sales')
            ->orwhere('accept_status','pending')->where('role','sales')
            ->orWhere('approval_status','reject')->where('role','sales')
            ->orWhere('accept_status','reject')->where('role','sales')
            ->count();
        $done = PurchaseRequest::where('accept_status', 'accept')->where('role','sales')->count();
        $jmlpowder = DB::table('item_requests')
            ->where('purchase_requests.role','=','sales')
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('powders', 'powders.id', '=', 'item_requests.powder_id')
            ->count();
        $jmlother = DB::table('item_requests')
            ->where('purchase_requests.role','=','sales')
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('items', 'items.id', '=', 'item_requests.id_item')
            ->count();
        $purchase_tabel = PurchaseRequest::where('purchase_requests.role','=','sales')->latest()->paginate(3);
        // $purchase_requests = PurchaseRequest::where('approval_status', '=', 'approve')->where('accept_status', '=', 'accept')->get();
        return view('home.Sales.dashboard',compact('purchase','orders','pending','done','jmlpowder','jmlother','purchase_tabel'));
    }

    public function index_finance()
    {
        $purchase = PurchaseRequest::where('role','finance')->count();
        $orders = DB::table('item_requests')
            ->where('purchase_requests.role','=','finance')
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('orders', 'orders.id', '=', 'item_requests.order_id')
            ->count();
        $pending=PurchaseRequest::where('approval_status','pending')->where('role','finance')
            ->orwhere('accept_status','pending')->where('role','finance')
            ->orWhere('approval_status','reject')->where('role','finance')
            ->orWhere('accept_status','reject')->where('role','finance')
            ->count();
        $done = PurchaseRequest::where('accept_status', 'accept')->where('role','finance')->count();
        $jmlpowder = DB::table('item_requests')
            ->where('purchase_requests.role','=','finance')
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('powders', 'powders.id', '=', 'item_requests.powder_id')
            ->count();
        $jmlother = DB::table('item_requests')
            ->where('purchase_requests.role','=','finance')
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('items', 'items.id', '=', 'item_requests.id_item')
            ->count();
        $purchase_tabel = PurchaseRequest::where('purchase_requests.role','=','finance')->latest()->paginate(3);
        // $purchase_requests = PurchaseRequest::where('approval_status', '=', 'approve')->where('accept_status', '=', 'accept')->get();
        return view('home.Finance.dashboard',compact('purchase','orders','pending','done','jmlpowder','jmlother','purchase_tabel'));
    }

    public function index_wirehouse()
    {
        $purchase = PurchaseRequest::where('role','wirehouse')->count();
        $orders = DB::table('item_requests')
            ->where('purchase_requests.role','=','wirehouse')
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('orders', 'orders.id', '=', 'item_requests.order_id')
            ->count();
        $pending=PurchaseRequest::where('approval_status','pending')->where('role','wirehouse')
            ->orwhere('accept_status','pending')->where('role','wirehouse')
            ->orWhere('approval_status','reject')->where('role','wirehouse')
            ->orWhere('accept_status','reject')->where('role','wirehouse')
            ->count();
        $done = PurchaseRequest::where('accept_status', 'accept')->where('role','wirehouse')->count();
        $jmlpowder = DB::table('item_requests')
            ->where('purchase_requests.role','=','wirehouse')
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('powders', 'powders.id', '=', 'item_requests.powder_id')
            ->count();
        $jmlother = DB::table('item_requests')
            ->where('purchase_requests.role','=','wirehouse')
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('items', 'items.id', '=', 'item_requests.id_item')
            ->count();
        $purchase_tabel = PurchaseRequest::where('purchase_requests.role','=','wirehouse')->latest()->paginate(3);
        // $purchase_requests = PurchaseRequest::where('approval_status', '=', 'approve')->where('accept_status', '=', 'accept')->get();
        return view('home.Wirehouse.dashboard',compact('purchase','orders','pending','done','jmlpowder','jmlother','purchase_tabel'));
    }

    public function manager()
    {
        $purchase = DB::table('purchase_requests')->count();
        $orders = DB::table('orders')->count();

        $pending = DB::table('purchase_requests')
                    ->where('approval_status','pending')
                    ->count();

        $reject = DB::table('purchase_requests')
                    ->where('approval_status','reject')
                    ->count();

        $prapprove = DB::table('purchase_requests')
                    ->where('approval_status','accept')
                    ->orWhere('approval_status','edit')
                    ->count();

        $jmlpowder = DB::table('powders')->count();
        $jmlother = DB::table('items')->count();
        
        $purchase_tabel = DB::table('purchase_requests')
                                ->join('prefixes','purchase_requests.prefixes_id','=','prefixes.id')
                                ->select('prefixes.divisi','purchase_requests.*')
                                ->latest()
                                ->paginate(3);

        return view('home.dashboard_manager',compact('orders','prapprove','pending','reject','jmlpowder','jmlother','purchase_tabel'));
    }

    public function manager_sales()
    {
        $orders = DB::table('item_requests')
            ->where('purchase_requests.role','=','sales')
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('orders', 'orders.id', '=', 'item_requests.order_id')
            ->count();
        $prapprove=PurchaseRequest::where('approval_status', 'approve')->where('role', 'sales')
            ->orwhere('approval_status', 'edit')->where('role', 'sales')
            ->count();
        $pending=PurchaseRequest::where('approval_status', 'pending')->where('role', 'sales')->count();
        $reject=PurchaseRequest::where('approval_status', 'reject')->where('role', 'sales')->count();
        $purchase_tabel = PurchaseRequest::where('role', 'sales')->latest()->paginate(3);
        $jmlpowder = DB::table('item_requests')
            ->where('purchase_requests.role','=','sales')
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('powders', 'powders.id', '=', 'item_requests.powder_id')
            ->count();
        $jmlother = DB::table('item_requests')
            ->where('purchase_requests.role','=','sales')
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('items', 'items.id', '=', 'item_requests.id_item')
            ->count();
        return view('home.Sales.manager',compact('orders','prapprove','pending','reject','jmlpowder','jmlother','purchase_tabel'));
    }

    public function manager_finance()
    {
        $orders = DB::table('item_requests')
            ->where('purchase_requests.role','=','finance')
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('orders', 'orders.id', '=', 'item_requests.order_id')
            ->count();
        $prapprove=PurchaseRequest::where('approval_status', 'approve')->where('role', 'finance')
            ->orwhere('approval_status', 'edit')->where('role', 'finance')
            ->count();
        $pending=PurchaseRequest::where('approval_status', 'pending')->where('role', 'finance')->count();
        $reject=PurchaseRequest::where('approval_status', 'reject')->where('role', 'finance')->count();
        $purchase_tabel = PurchaseRequest::where('role', 'finance')->latest()->paginate(3);
        $jmlpowder = DB::table('item_requests')
            ->where('purchase_requests.role','=','finance')
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('powders', 'powders.id', '=', 'item_requests.powder_id')
            ->count();
        $jmlother = DB::table('item_requests')
            ->where('purchase_requests.role','=','finance')
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('items', 'items.id', '=', 'item_requests.id_item')
            ->count();
        return view('home.Finance.manager',compact('orders','prapprove','pending','reject','jmlpowder','jmlother','purchase_tabel'));
    }

    public function manager_wirehouse()
    {
        $orders = DB::table('item_requests')
            ->where('purchase_requests.role','=','wirehouse')
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('orders', 'orders.id', '=', 'item_requests.order_id')
            ->count();
        $prapprove=PurchaseRequest::where('approval_status', 'approve')->where('role', 'wirehouse')
            ->orwhere('approval_status', 'edit')->where('role', 'wirehouse')
            ->count();
        $pending=PurchaseRequest::where('approval_status', 'pending')->where('role', 'wirehouse')->count();
        $reject=PurchaseRequest::where('approval_status', 'reject')->where('role', 'wirehouse')->count();
        $purchase_tabel = PurchaseRequest::where('role', 'wirehouse')->latest()->paginate(3);
        $jmlpowder = DB::table('item_requests')
            ->where('purchase_requests.role','=','wirehouse')
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('powders', 'powders.id', '=', 'item_requests.powder_id')
            ->count();
        $jmlother = DB::table('item_requests')
            ->where('purchase_requests.role','=','wirehouse')
            ->join('purchase_requests', 'purchase_requests.id', '=', 'item_requests.id_request')
            ->join('items', 'items.id', '=', 'item_requests.id_item')
            ->count();
        return view('home.Wirehouse.manager',compact('orders','prapprove','pending','reject','jmlpowder','jmlother','purchase_tabel'));
    }
    public function purchasing()
    {
        $purchase_requests_pending = DB::table('purchase_requests')
                                        ->join('prefixes','purchase_requests.prefixes_id','=','prefixes.id')
                                        ->select('prefixes.divisi','purchase_requests.*')
                                        ->where('approval_status','=','approve')
                                        ->orWhere('approval_status','=','edit')
                                        ->latest()
                                        ->paginate(3);
        #Using Query Builder count
        $orders = DB::table('orders')->count();
        $jmlother = DB::table('items')->count();
        $jmlpowder = DB::table('powders')->count();
        $purchase = DB::table('purchase_requests')->count();

        $prmasuk = DB::table('purchase_requests')
                        ->where('approval_status','approve')->where('accept_status','pending')
                        ->orWhere('approval_status','edit')->where('accept_status','pending')
                        ->orWhere('approval_status','approve')->where('accept_status','reject')
                        ->orWhere('approval_status','edit')->where('accept_status','reject')
                        ->count();

        $poselesai = DB::table('purchase_requests')
                        ->where('accept_status','accept')
                        ->orWhere('accept_status','edit')
                        ->count();

        $reject = DB::table('purchase_requests')->where('accept_status', 'reject')->count();

        return view('home.dashboard_purchasing',compact('poselesai','orders','prmasuk','jmlpowder','jmlother','reject','purchase_requests_pending'));
    }

    


    // Dashboard manager
    public function approval()
    {
        $purchase_requests_pending = DB::table('purchase_requests')
                                            ->where('approval_status', '=', 'pending')
                                            ->join('prefixes','purchase_requests.prefixes_id','=','prefixes.id')
                                            ->select('prefixes.divisi','purchase_requests.*')
                                            ->get();

        $purchase_requests_approve = DB::table('purchase_requests')
                                            ->where('approval_status', '=', 'approve')
                                            ->orwhere('approval_status', '=', 'edit')
                                            ->join('prefixes','purchase_requests.prefixes_id','=','prefixes.id')
                                            ->select('prefixes.divisi','purchase_requests.*')
                                            ->get();

        $purchase_request_reject = DB::table('purchase_requests')
                                        ->where('approval_status', '=', 'reject')
                                        ->join('prefixes','purchase_requests.prefixes_id','=','prefixes.id')
                                        ->select('prefixes.divisi','purchase_requests.*')
                                        ->get();

        return view('Approval.dashboard', compact("purchase_requests_pending", 'purchase_requests_approve', 'purchase_request_reject'));
    }

    public function sales_approval()
    {
        $purchase_requests_pending = PurchaseRequest::where('approval_status', '=', 'pending')->where('role','=','sales')->get();
        $purchase_requests_approve = PurchaseRequest::where('approval_status', '=', 'approve')->where('role','=','sales')
                                                    ->orwhere('approval_status', '=', 'edit')->where('role','=','sales')
                                                    ->get();
        $purchase_request_reject = PurchaseRequest::where('approval_status', '=', 'reject')->where('role','=','sales')->get();
        return view('Approval.dashboard', compact("purchase_requests_pending", 'purchase_requests_approve', 'purchase_request_reject'));
    }

    public function finance_approval()
    {
        $purchase_requests_pending = PurchaseRequest::where('approval_status', '=', 'pending')->where('role','=','finance')->get();
        $purchase_requests_approve = PurchaseRequest::where('approval_status', '=', 'approve')->where('role','=','finance')
                                                    ->orwhere('approval_status', '=', 'edit')->where('role','=','finance')
                                                    ->get();
        $purchase_request_reject = PurchaseRequest::where('approval_status', '=', 'reject')->where('role','=','finance')->get();
        return view('Approval.dashboard', compact("purchase_requests_pending", 'purchase_requests_approve', 'purchase_request_reject'));
    }

     public function wirehouse_approval()
    {
        $purchase_requests_pending = PurchaseRequest::where('approval_status', '=', 'pending')->where('role','=','wirehouse')->get();
        $purchase_requests_approve = PurchaseRequest::where('approval_status', '=', 'approve')->where('role','=','wirehouse')
                                                    ->orwhere('approval_status', '=', 'edit')->where('role','=','wirehouse')
                                                    ->get();
        $purchase_request_reject = PurchaseRequest::where('approval_status', '=', 'reject')->where('role','=','wirehouse')->get();
        return view('Approval.dashboard', compact("purchase_requests_pending", 'purchase_requests_approve', 'purchase_request_reject'));
    }

    // Dashboard Purchasing
    public function accept_page()
    {
        $purchase_requests_pending =  DB::table('purchase_requests')
                                            ->where('approval_status', '=', 'approve')
                                            ->where('accept_status', 'pending')
                                            ->orWhere('approval_status', '=', 'edit')
                                            ->where('accept_status', 'pending')
                                            ->join('prefixes','purchase_requests.prefixes_id','=','prefixes.id')
                                            ->select('prefixes.divisi','purchase_requests.*')
                                            ->get();

        $purchase_requests_approve = DB::table('purchase_requests')
                                            ->where('accept_status', 'edit')
                                            ->orwhere('accept_status', 'accept')
                                            ->join('prefixes','purchase_requests.prefixes_id','=','prefixes.id')
                                            ->select('prefixes.divisi','purchase_requests.*')
                                            ->get();

        $purchase_request_reject = DB::table('purchase_requests')
                                            ->where('accept_status', 'reject')
                                            ->join('prefixes','purchase_requests.prefixes_id','=','prefixes.id')
                                            ->select('prefixes.divisi','purchase_requests.*')
                                            ->get();

        return view('Approval.diterima',  compact("purchase_requests_pending", 'purchase_requests_approve', 'purchase_request_reject'));
    }

    public function view($id)
    {
        $purchase_requests = PurchaseRequest::find($id);
        $item = Item::with('master_item', 'satuan')->get();
        $Location = location::get();
        $Ship = ships::get();
        $Prefixe = Prefix::get();

        return view('Approval.view', compact('purchase_requests', 'Location', 'Ship', 'Prefixe', 'item'));
    }
    public function purchasing_view($id)
    {
        $purchase_requests = PurchaseRequest::find($id);
        $item = Item::with('master_item', 'satuan')->get();

        return view('Approval.accept', compact('purchase_requests', 'item'));
    }

    public function purchasing_edit($id)
    {
        $Supplier = Supplier::get();
        $Grade = Grade::get();
        $purchase_requests = PurchaseRequest::findOrFail($id);
        $colour = Colour::get();
        $Location = location::get();
        $Ship = ships::get();
        $satuan = Satuan::get();
        $master_item = Master_Item::get();
        $Prefixe = Prefix::get();

        return view('Approval.purchasing_edit', compact('satuan', 'master_item', 'Supplier', 'Grade', 'colour', 'purchase_requests', 'Location', 'Ship', 'Prefixe'));
    }

    public function edit($id)
    {
        $Supplier = Supplier::get();
        $Grade = Grade::get();
        $purchase_requests = PurchaseRequest::findOrFail($id);
        $colour = Colour::get();
        $Location = location::get();
        $Ship = ships::get();
        $satuan = Satuan::get();
        $master_item = Master_Item::get();
        $Prefixe = Prefix::get();

        return view('Approval.edit', compact('satuan', 'master_item', 'Supplier', 'Grade', 'colour', 'purchase_requests', 'Location', 'Ship', 'Prefixe'));
    }

    public function update_good(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        $item->update([
            'id_master_item' => $request->id_master_item,
            'stok' => $request->stok,
            'id_satuan' => $request->id_satuan
        ]);

        return redirect()->back()->with('teredit', 'Berhasil mengedit data barang');
    }

    public function update_powder(Request $request, $id)
    {
        $powder = Powder::findOrFail($id);

        $powder->update([
            'warna' => $request->warna,
            'color_id' => $request->color_id,
            'grades_id' => $request->grades_id,
            'suppliers_id' => $request->suppliers_id,
            'finish' => $request->finish,
            'finishing' => $request->finishing,
            'quantity' => $request->quantity,
            'm2' => $request->m2,
            'estimasi' => $request->estimasi,
            'fresh' => $request->fresh,
            'recycle' => $request->recycle,
            'alokasi' => $request->alokasi
        ]);

        return redirect()->back()->with('teredit', 'Berhasil mengedit data barang');
    }

    public function accept($id)
    {
        $purchase_requests = PurchaseRequest::findOrFail($id);
        $Location = location::get();
        $Ship = ships::get();
        $Prefixe = Prefix::get();

        return view('Approval.accept', compact('purchase_requests', 'Location', 'Ship', 'Prefixe'));
    }

    public function create_reject($id)
    {
        $reject = PurchaseRequest::findOrFail($id);
        return view('Approval.reject.add', compact('reject'));
    }

    public function create_accept_reject($id)
    {
        $reject = PurchaseRequest::findOrFail($id);
        return view('Approval.reject_Purchasing.add', compact('reject'));
    }

    public function store_reject(Request $request, $id)
    {
        $purchase = PurchaseRequest::find($id);

        DB::table('purchase_requests')->where('id', $id)->update([
            'feedback_manager' => $request->feedback_manager,
            'approval_status' => 'reject'
        ]);

        if($purchase->role == 'sales')
        {
            return redirect('manager_sales/approval')->with('terhapus', 'Reject Terkirim');
        }
        elseif($purchase->role == 'finance')
        {
            return redirect('manager_finance/approval')->with('terhapus', 'Reject Terkirim');
        }
        elseif($purchase->role == 'wirehouse')
        {
            return redirect('manager_wirehouse/approval')->with('terhapus', 'Reject Terkirim');
        }
        else{
            return redirect('approval')->with('terhapus', 'Reject Terkirim');
        }
    }

    public function store_accept_reject(Request $request, $id)
    {
        DB::table('purchase_requests')->where('id', $id)->update([
            'feedback_purchasing' => $request->feedback_purchasing,
            'accept_status' => 'reject'
        ]);


        return redirect('approval/accept')->with('terhapus', 'Reject Terkirim');
    }


    public function update(request $request, $id)
    {
        //perlu diubah
        $purchase = PurchaseRequest::find($id);

        DB::table('purchase_requests')->where('id', $id)->update([
            'tanggal_diterima' => $request->tanggal_diterima,
            'approval_status' => $request->approval_status

        ]);

        // $purchase_requests = PurchaseRequest::paginate(5);
        if($purchase->role == 'sales')
        {
            return redirect('manager_sales/approval')->with('success', 'Berhasil mengubah status');
        }
        elseif($purchase->role == 'finance')
        {
            return redirect('manager_finance/approval')->with('success', 'Berhasil mengubah status');
        }
        elseif($purchase->role == 'wirehouse')
        {
            return redirect('manager_wirehouse/approval')->with('success', 'Berhasil mengubah status');
        }
        else{
            return redirect('approval')->with('success', 'Berhasil mengubah status');
        }
        
    }

    public function update_edit(request $request, $id)
    {
        //perlu diubah
        $purchase = PurchaseRequest::find($id);

        DB::table('purchase_requests')->where('id', $id)->update([
            'tanggal_diterima' => $request->tanggal_diterima,
            'approval_status' => 'edit'

        ]);

        // $purchase_requests = PurchaseRequest::paginate(5);
        if($purchase->role == 'sales')
        {
            return redirect('manager_sales/approval')->with('success', 'Berhasil mengubah status');
        }
        elseif($purchase->role == 'finance')
        {
            return redirect('manager_finance/approval')->with('success', 'Berhasil mengubah status');
        }
        elseif($purchase->role == 'wirehouse')
        {
            return redirect('manager_wirehouse/approval')->with('success', 'Berhasil mengubah status');
        }
        else{
            return redirect('approval')->with('success', 'Berhasil mengubah status');
        }
    }

    public function update_accept(request $request, $id)
    {
        DB::table('purchase_requests')->where('id', $id)->update([
            'accept_status' => $request->accept_status,

        ]);
        return redirect('approval/accept')->with('success', 'Berhasil mengubah status');
    }
    public function update_accept_edit(request $request, $id)
    {
        DB::table('purchase_requests')->where('id', $id)->update([
            'accept_status' => 'edit',

        ]);
        return redirect('approval/accept')->with('success', 'Berhasil mengubah status');
    }
    public function delete($id)
    {
        DB::table('purchase_requests')->where('id', $id)->delete();

        return redirect('approval')->with('terhapus', 'Berhasil purchasing request');
    }

    public function delete_item($id)
    {
        DB::table('items')->where('id', $id)->delete();

        return redirect()->back()->with('terhapus', 'Berhasil menghapus data barang');
    }
}
