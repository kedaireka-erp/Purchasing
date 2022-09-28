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
    public function approval()
    {
        $purchase_requests = PurchaseRequest::where('approval_status', 'pending')->get();
        return view('Approval.dashboard', compact("purchase_requests"));
    }
    public function approval_done()
    {
        $purchase_requests = PurchaseRequest::where('approval_status', 'approve')->get();
        return view('Approval.dashboard', compact("purchase_requests"));
    }
    
    public function accept_page()
    {
        $purchase_requests = PurchaseRequest::where('approval_status', 'approve')->where('accept_status', 'pending')->get();
        return view('Approval.diterima', compact("purchase_requests"));
    }

    public function accept_page_done()
    {
        $purchase_requests = PurchaseRequest::where('approval_status', 'approve')->where('accept_status', 'accept')->get();
        return view('Approval.diterima', compact("purchase_requests"));
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

    public function edit($id)
    {
        $purchase_requests = PurchaseRequest::findOrFail($id);
        $Location = location::get();
        $Ship = ships::get();
        $Prefixe = Prefix::get();

        return view('Approval.edit', compact('purchase_requests', 'Location', 'Ship', 'Prefixe'));
    }

    public function accept($id)
    {
        $purchase_requests = PurchaseRequest::findOrFail($id);
        $Location = location::get();
        $Ship = ships::get();
        $Prefixe = Prefix::get();

        return view('Approval.accept', compact('purchase_requests', 'Location', 'Ship', 'Prefixe'));
    }

    public function update(request $request, $id)
    {
        //perlu diubah

        DB::table('purchase_requests')->where('id', $id)->update([
            'tanggal_diterima' => $request->tanggal_diterima,
            'approval_status' => $request->approval_status

        ]);

        $purchase_requests = PurchaseRequest::paginate(5);
        return redirect('approval');
    }

    public function update_accept(request $request, $id)
    {
        DB::table('purchase_requests')->where('id', $id)->update([
            'accept_status' => $request->accept_status,

        ]);
        return redirect('approval/accept');
    }
    public function delete($id)
    {
        DB::table('purchase_requests')->where('id', $id)->delete();

        return redirect('approval')->with('terhapus', 'Berhasil purchasing request');
    }
}
