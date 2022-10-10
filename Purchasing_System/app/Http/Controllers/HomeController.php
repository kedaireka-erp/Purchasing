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
        $purchase= PurchaseRequest::count();
        $orders= Order::count();
        $pending=PurchaseRequest::where('approval_status','pending')->orWhere('approval_status','reject')->orWhere('accept_status','reject')->count();
        $done=PurchaseRequest::where('accept_status', 'accept')->count();
        $jmlpowder = Powder::count();
        $jmlother = Item::count();
        $purchase_tabel = PurchaseRequest::latest()->paginate(3);
        $purchase_requests = PurchaseRequest::where('approval_status', '=', 'approve')->where('accept_status', '=', 'accept')->get();
        return view('home.dashboard',compact('purchase','orders','pending','done','jmlpowder','jmlother','purchase_tabel','purchase_requests'));
    }
    public function manager()
    {
        $divisi= Prefix::count();
        $orders= Order::count();
        $prapprove=PurchaseRequest::where('approval_status', 'approve')->count();
        $pending=PurchaseRequest::where('approval_status', 'pending')->count();
        return view('home.dashboard_manager',compact('divisi','orders','prapprove','pending'));
    }
    public function purchasing()
    {
        $divisi= Prefix::count();
        $orders= Order::count();
        $prmasuk=PurchaseRequest::where('accept_status', 'panding')->count();
        $prmasukaprv=PurchaseRequest::where('approval_status','accept')->count();
        $poselesai=PurchaseRequest::where('approval_status','approve')->count();
        $selesai=PurchaseRequest::where('accept_status', 'accept')->count();
        
        return view('home.dashboard_purchasing',compact('divisi','poselesai','selesai','orders','prmasukaprv','prmasuk'));
    }

    


    // Dashboard manager
    public function approval()
    {
        $purchase_requests_pending = PurchaseRequest::where('approval_status', '=', 'pending')->get();
        $purchase_requests_approve = PurchaseRequest::where('approval_status', '=', 'approve')->get();
        $purchase_request_reject = PurchaseRequest::where('approval_status', '=', 'reject')->get();
        return view('Approval.dashboard', compact("purchase_requests_pending", 'purchase_requests_approve', 'purchase_request_reject'));
    }

    // Dashboard Purchasing
    public function accept_page()
    {
        $pr_condition1 =  PurchaseRequest::where('approval_status', '=', 'approve')->where('accept_status', 'pending')->get();
        $pr_condition2 =  PurchaseRequest::where('approval_status', '=', 'edit')->where('accept_status', 'pending')->get();
        $purchase_requests_pending = PurchaseRequest::where('approval_status', '=', 'approve')->where('accept_status', 'pending')->orWhere('approval_status', '=', 'edit')->where('accept_status', 'pending')->get();
        $purchase_requests_approve = PurchaseRequest::where('approval_status', 'approve')->where('accept_status', 'accept')->get();
        $purchase_request_reject = PurchaseRequest::where('accept_status', 'reject')->get();
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
        $Location = location::get();
        $Ship = ships::get();
        $Prefixe = Prefix::get();

        return view('Approval.accept', compact('purchase_requests', 'Location', 'Ship', 'Prefixe', 'item'));
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
        DB::table('purchase_requests')->where('id', $id)->update([
            'feedback_manager' => $request->feedback_manager,
            'approval_status' => 'reject'
        ]);


        return redirect('/approval')->with('terhapus', 'Reject Terkirim');
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


        DB::table('purchase_requests')->where('id', $id)->update([
            'tanggal_diterima' => $request->tanggal_diterima,
            'approval_status' => $request->approval_status

        ]);

        // $purchase_requests = PurchaseRequest::paginate(5);
        return redirect('approval')->with('success', 'Berhasil mengubah status');
    }

    public function update_edit(request $request, $id)
    {
        //perlu diubah


        DB::table('purchase_requests')->where('id', $id)->update([
            'tanggal_diterima' => $request->tanggal_diterima,
            'approval_status' => 'edit'

        ]);

        // $purchase_requests = PurchaseRequest::paginate(5);
        return redirect('approval')->with('success', 'Berhasil mengubah status');
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
