<?php

namespace App\Http\Controllers;

use App\Models\location;
use App\Models\Prefix;
use App\Models\PurchaseRequest;
use App\Models\ships;
use Illuminate\Http\Request;

class PurchaseRequestController extends Controller
{
    public function index(Request $request){
        if ($request->filled('search')) {
            $purchase_requests = PurchaseRequest::search($request->search)->paginate(5);
        }else{
            $purchase_requests = PurchaseRequest::paginate(5);
        }
        
        return view('purchases.index', compact('purchase_requests'));
    }

    public function create(){

        $Location=location::get();
        $Ship=ships::get();
        $Prefixe=Prefix::get();
        return view('purchases.create', compact('Location','Ship', "Prefixe"));
    }

    public function store(Request $request){

        $validateData = $request->validate([
            'no_pr'=>'required|unique:purchase_requests|max:100',
            'deadline_date'=>'required',
            'requester'=>'required|max:100',
            'project'=>'required|max:100',
            'attachment'=>'required|max:100',

        ], [
            'no_pr.required'=>"Nomor PR field is required.",
            'deadline_date.required'=>"Deadline Date field is required ",
            'requester.required'=>"Requester field is required ",
            'project.required'=>"Project field is required ",
            'attachment.required'=>"Attachment field is required ",
        ]);

        $purchase_requests = PurchaseRequest::create([
            'no_pr'=>$request->no_pr,
            'deadline_date'=>$request->deadline_date,
            'requester'=>$request->requester,
            'prefixes_id'=>$request->prefixes_id,
            'project'=>$request->project,
            'locations_id'=>$request->locations_id,
            'ships_id'=>$request->ships_id,
            'note'=>$request->note,
            'attachment'=>$request->attachment,

        ]);

        return redirect('/');
    }

    public function edit($id){
        $purchase_requests = PurchaseRequest::findOrFail($id);
        $Location=location::get();
        $Ship=ships::get();
        $Prefixe=Prefix::get();
        
        return view('purchases.edit', compact('purchase_requests', 'Location', 'Ship', 'Prefixe'));
    }

    public function update(Request $request, $id){
        $purchase_requests = PurchaseRequest::findOrFail($id);
        $purchase_requests->update([
            'no_pr'=>$request->no_pr ?? $purchase_requests->no_pr,
            'deadline_date'=>$request->deadline_date ?? $purchase_requests->deadline_date,
            'requester'=>$request->requester ?? $purchase_requests->requester,
            'prefixes_id'=>$request->prefixes_id ?? $purchase_requests->prefixes_id,
            'project'=>$request->project ?? $purchase_requests->project,
            'locations_id'=>$request->locations_id ?? $purchase_requests->locations_id,
            'ships_id'=>$request->ships_id ?? $purchase_requests->ships_id,
            'note'=>$request->note ?? $purchase_requests->note,
            'attachment'=>$request->attachment ?? $purchase_requests->attachment,
        ]);
        return redirect('/');

    }

    public function destroy($id){

        $purchase_requests = PurchaseRequest::findOrFail($id);
        $purchase_requests->delete();

        return redirect("/");
     }
}
