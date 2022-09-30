<?php

namespace App\Http\Controllers;

use App\Models\location;
use App\Models\Prefix;
use App\Models\PurchaseRequest;
use App\Models\Colour;
use App\Models\ships;
use App\Models\Master_Item;
use App\Models\Satuan;
use App\Models\Supplier;
use App\Models\Grade;
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
<<<<<<< Updated upstream
        $purchase_requests = PurchaseRequest::where('approval_status', 'pending')->get();
        return view('Approval.dashboard', compact("purchase_requests"));
=======
        $purchase_requests_pending = PurchaseRequest::where('approval_status','=','pending')->get();
        $purchase_requests_approve = PurchaseRequest::where('approval_status', '=', 'approve')->get();
        return view('Approval.dashboard', compact("purchase_requests_pending", 'purchase_requests_approve'));

        
        
>>>>>>> Stashed changes
    }
    public function approval_done()
    {
        $purchase_requests = PurchaseRequest::where('approval_status', 'approve')->get();
        return view('Approval.dashboard', compact("purchase_requests"));
    }
    public function approval_reject()
    {
        $purchase_requests = PurchaseRequest::where('approval_status', 'reject')->get();
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
    public function accept_page_reject()
    {
        $purchase_requests = PurchaseRequest::where('approval_status', 'approve')->where('accept_status', 'reject')->get();
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
        $Supplier = Supplier::get();
        $Grade = Grade::get();
        $purchase_requests = PurchaseRequest::findOrFail($id);
        $colour = Colour::get();
        $Location = location::get();
        $Ship = ships::get();
        $Prefixe = Prefix::get();

        return view('Approval.edit', compact('Supplier','Grade','colour','purchase_requests', 'Location', 'Ship', 'Prefixe'));
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
        return view('Approval.reject.add',compact('reject'));
        
    }

    public function create_accept_reject($id)
    {
        $reject = PurchaseRequest::findOrFail($id);
        return view('Approval.reject_Purchasing.add',compact('reject'));
        
    }

    public function store_reject(Request $request, $id)
    {
        DB::table('purchase_requests')->where('id', $id)->update([
            'feedback' => $request->feedback,
            'approval_status' => 'reject'
        ]);
        

        return redirect('/approval/reject');
    }

    public function store_accept_reject(Request $request, $id)
    {
        DB::table('purchase_requests')->where('id', $id)->update([
            'feedback' => $request->feedback,
            'accept_status' => 'reject'
        ]);
        

        return redirect('approval/accept/reject');
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
