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
use Illuminate\Http\Request;

class PurchaseRequestController extends Controller
{
    public function index(Request $request){
        if ($request->filled('search')) {
            $purchase_requests = PurchaseRequest::search($request->search)->paginate(5);
        }else{
            $purchase_requests = PurchaseRequest::with('Prefixe')->paginate(5);
        }

        return view('purchases.index', compact('purchase_requests'));
    }

    public function create(){
        $purchase_requests = PurchaseRequest::with('Prefixe');
        $Location=location::get();
        $Ship=ships::get();
        $Prefixe=Prefix::get();
        $master_item = Master_Item::get();
        $satuan = Satuan::get();
        
        return view('purchases.create', compact('Location','Ship', "Prefixe",'master_item','satuan'));
    }

    public function store(Request $request){

        $validateData = $request->validate([
            'deadline_date'=>'required',
            'requester'=>'required|max:100',
            'project'=>'max:100',
            'attachment' => 'mimes:jpeg,img,jpg,png|max:20000',
            'locations_id' => 'required',
            'prefixes_id' => 'required',
            'ships_id' => 'required'

        ], [
            'deadline_date.required'=>"Deadline Date field is required ",
            'requester.required'=>"Requester field is required ",
            'project.required'=>"Project field is required ",
            'attachment.required'=>"Attachment field is required ",
        ]);
        if($request->hasFile('attachment'))
        {
            $destination_path = 'public/assets/images/products';
            $image = $request->file('attachment');
            $image_name = $image->getClientOriginalName();
            $path = $request -> file('attachment')->storeAs($destination_path,$image_name);

            $purchase_requests = PurchaseRequest::create([
                // 'no_pr'=>$request->no_pr,
                'deadline_date'=>$request->deadline_date,
                'type'=>$request->type,
                'requester'=>$request->requester,
                'prefixes_id'=>$request->prefixes_id,
                'project'=>$request->project,
                'locations_id'=>$request->locations_id,
                'ships_id'=>$request->ships_id,
                'note'=>$request->note,
                'attachment'=>$image_name,
    
            ]);

        }
        else {
            $purchase_requests = PurchaseRequest::create([
                // 'no_pr'=>$request->no_pr,
                'deadline_date'=>$request->deadline_date,
                'type'=>$request->type,
                'requester'=>$request->requester,
                'prefixes_id'=>$request->prefixes_id,
                'project'=>$request->project,
                'locations_id'=>$request->locations_id,
                'ships_id'=>$request->ships_id,
                'note'=>$request->note,
    
            ]);
        }

        // foreach ($request->addMoreInputFields as $key => $value) {
        //     Item::create($value);
            
           
        // }

        
        


            // $new_requests = New Item;

            // $request_id = $purchase_requests->id;

            // $request = PurchaseRequest::find($request_id);

            // $new_requests->purchase()->attach($request);

            

        return redirect('/purchase_request');
    }

    public function edit($id){
        $purchase_requests = PurchaseRequest::findOrFail($id);
        $Location=location::get();
        $Ship=ships::get();
        $Prefixe=Prefix::get();

        return view('purchases.edit', compact('purchase_requests', 'Location', 'Ship', 'Prefixe'));
    }

    public function view($id){
        $purchase_requests = PurchaseRequest::findOrFail($id);

        $item = DB::table('items')
                ->join('purchase_requests', 'id_request', '=', 'purchase_requests.id')
                ->join('master_items', 'id_master_item', '=', 'master_items.id')
                ->join('satuans', 'id_satuan', '=', 'satuans.id')
                ->select('items.*', 'master_items.item_name','satuans.unit')
                ->get();

        $Location=location::get();
        $Ship=ships::get();
        $Prefixe=Prefix::get();

        return view('view', compact('purchase_requests', 'Location', 'Ship', 'Prefixe','item'));
    }

    public function plus($id){
        $purchase_requests = PurchaseRequest::findOrFail($id);
        
        $item = DB::table('items')
                ->join('purchase_requests', 'id_request', '=', 'purchase_requests.id')
                ->join('master_items', 'id_master_item', '=', 'master_items.id')
                ->join('satuans', 'id_satuan', '=', 'satuans.id')
                ->select('items.*','master_items.item_name','satuans.unit')
                ->get();
        $satuan = Satuan::get();
        $master_item = Master_Item::get();

        return view('item.add', compact('purchase_requests','item','master_item','satuan'));
    }

    public function storeplus(Request $request, $id)
    {
        foreach ($request->addMoreInputFields as $key => $value) {
            Item::create($value);
        }
        return redirect('/purchase_request');
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
        return redirect('/purchase_request');

    }

    public function destroy($id){

        $purchase_requests = PurchaseRequest::findOrFail($id);
        $purchase_requests->delete();

        return redirect("/purchase_request");
     }
}