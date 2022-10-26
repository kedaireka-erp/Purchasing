<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Colour;
use App\Models\location;
use App\Models\Prefix;
use App\Models\PurchaseRequest;
use App\Models\ships;
use App\Models\Master_Item;
use App\Models\Satuan;
use App\Models\Item;
use App\Models\ItemRequest;
use App\Models\Powder;
use App\Models\Supplier;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PurchaseRequestController extends Controller
{

    // *******************
    //     Index Home
    // ********************
    public function index(Request $request){
        if ($request->filled('search')) {
            $purchase_requests = PurchaseRequest::search($request->search)->get();
        }else{
            $items = Item::get();
            $powders = Powder::get();
            $purchase_requests = PurchaseRequest::where('approval_status', '=', 'approve')->where('accept_status', '=', 'accept')
                            ->orWhere('approval_status', '=', 'approve')->where('accept_status', '=', 'edit')
                                ->orWhere('approval_status', '=', 'edit')->where('accept_status', '=', 'accept')
                                ->orWhere('approval_status', '=', 'edit')->where('accept_status', '=', 'edit')
                                ->get();
            $purchase_requests_pending = PurchaseRequest::where('approval_status', '=', 'pending')
                                        ->orWhere('approval_status', '=', 'edit')->where('accept_status', '=', 'pending')
                                        ->orwhere('approval_status', '=', 'approve')->where('accept_status', '=', 'pending')->get();
            $purchase_requests_reject = PurchaseRequest::where('approval_status', '=', 'reject')->orwhere('accept_status', '=', 'reject')->get();
        }

        return view('purchases.index', compact('items','powders','purchase_requests', 'purchase_requests_pending', 'purchase_requests_reject'));
    }

    public function index_pr_sales(Request $request){
        if ($request->filled('search')) {
            $purchase_requests = PurchaseRequest::search($request->search)->get();
        }else{
            $items = Item::get();
            $powders = Powder::get();
            $purchase_requests = PurchaseRequest::where('approval_status', '=', 'approve')->where('accept_status', '=', 'accept')->where('role','sales')
                            ->orWhere('approval_status', '=', 'approve')->where('accept_status', '=', 'edit')->where('role','sales')
                                ->orWhere('approval_status', '=', 'edit')->where('accept_status', '=', 'accept')->where('role','sales')
                                ->orWhere('approval_status', '=', 'edit')->where('accept_status', '=', 'edit')->where('role','sales')
                                ->get();
            $purchase_requests_pending = PurchaseRequest::where('approval_status', '=', 'pending')->where('role','sales')
                                        ->orWhere('approval_status', '=', 'edit')->where('accept_status', '=', 'pending')->where('role','sales')
                                        ->orwhere('approval_status', '=', 'approve')->where('accept_status', '=', 'pending')->where('role','sales')->get();
            $purchase_requests_reject = PurchaseRequest::where('approval_status', '=', 'reject')->where('role','sales')
                                        ->orwhere('accept_status', '=', 'reject')->where('role','sales')->get();
        }

        return view('purchases.index', compact('items','powders','purchase_requests', 'purchase_requests_pending', 'purchase_requests_reject'));
    }

    public function index_pr_finance(Request $request){
        if ($request->filled('search')) {
            $purchase_requests = PurchaseRequest::search($request->search)->get();
        }else{
            $items = Item::get();
            $powders = Powder::get();
            $purchase_requests = PurchaseRequest::where('approval_status', '=', 'approve')->where('accept_status', '=', 'accept')->where('role','finance')
                            ->orWhere('approval_status', '=', 'approve')->where('accept_status', '=', 'edit')->where('role','finance')
                                ->orWhere('approval_status', '=', 'edit')->where('accept_status', '=', 'accept')->where('role','finance')
                                ->orWhere('approval_status', '=', 'edit')->where('accept_status', '=', 'edit')->where('role','finance')
                                ->get();
            $purchase_requests_pending = PurchaseRequest::where('approval_status', '=', 'pending')->where('role','finance')
                                        ->orWhere('approval_status', '=', 'edit')->where('accept_status', '=', 'pending')->where('role','finance')
                                        ->orwhere('approval_status', '=', 'approve')->where('accept_status', '=', 'pending')->where('role','finance')->get();
            $purchase_requests_reject = PurchaseRequest::where('approval_status', '=', 'reject')->where('role','finance')
                                        ->orwhere('accept_status', '=', 'reject')->where('role','finance')->get();
        }

        return view('purchases.index', compact('items','powders','purchase_requests', 'purchase_requests_pending', 'purchase_requests_reject'));
    }

    public function index_pr_wirehouse(Request $request){
        if ($request->filled('search')) {
            $purchase_requests = PurchaseRequest::search($request->search)->get();
        }else{
            $items = Item::get();
            $powders = Powder::get();
            $purchase_requests = PurchaseRequest::where('approval_status', '=', 'approve')->where('accept_status', '=', 'accept')->where('role','wirehouse')
                            ->orWhere('approval_status', '=', 'approve')->where('accept_status', '=', 'edit')->where('role','wirehouse')
                                ->orWhere('approval_status', '=', 'edit')->where('accept_status', '=', 'accept')->where('role','wirehouse')
                                ->orWhere('approval_status', '=', 'edit')->where('accept_status', '=', 'edit')->where('role','wirehouse')
                                ->get();
            $purchase_requests_pending = PurchaseRequest::where('approval_status', '=', 'pending')->where('role','wirehouse')
                                        ->orWhere('approval_status', '=', 'edit')->where('accept_status', '=', 'pending')->where('role','wirehouse')
                                        ->orwhere('approval_status', '=', 'approve')->where('accept_status', '=', 'pending')->where('role','wirehouse')->get();
            $purchase_requests_reject = PurchaseRequest::where('approval_status', '=', 'reject')->where('role','wirehouse')
                                        ->orwhere('accept_status', '=', 'reject')->where('role','wirehouse')->get();
        }

        return view('purchases.index', compact('items','powders','purchase_requests', 'purchase_requests_pending', 'purchase_requests_reject'));
    }




    public function track(Request $request){
        if ($request->filled('search')) {
            $purchase_requests = PurchaseRequest::search($request->search)->get();
        }else{
            $purchase_requests = PurchaseRequest::with('Prefixe')->get();
        }

        return view('Tracking.approval', compact('purchase_requests'));
    }


    // *******************
    //     Index Create
    // ********************
    public function create(){
        $colour = Colour::get();
        $purchase_requests = PurchaseRequest::with('Prefixe');
        $Location = location::get();
        $Ship = ships::get();
        $Prefixe = Prefix::get();
        $master_item = Master_Item::get();
        $satuan = Satuan::get();
        $Grade = Grade::get();
        $color = Supplier::get();
        $Powder = powder::get();
        
        return view('purchases.create', compact('purchase_requests','colour','Location','Ship', "Prefixe",'master_item','satuan', 'Grade'));
    }

    public function create_sales(){
        $colour = Colour::get();
        $purchase_requests = PurchaseRequest::with('Prefixe');
        $Location = location::get();
        $Ship = ships::get();
        $Prefixe = Prefix::get();
        $master_item = Master_Item::get();
        $satuan = Satuan::get();
        $Grade = Grade::get();
        $color = Supplier::get();
        $Powder = powder::get();
        
        return view('purchases.Sales.form', compact('purchase_requests','colour','Location','Ship', "Prefixe",'master_item','satuan', 'Grade'));
    }

    public function create_finance(){
        $colour = Colour::get();
        $purchase_requests = PurchaseRequest::with('Prefixe');
        $Location = location::get();
        $Ship = ships::get();
        $Prefixe = Prefix::get();
        $master_item = Master_Item::get();
        $satuan = Satuan::get();
        $Grade = Grade::get();
        $color = Supplier::get();
        $Powder = powder::get();
        
        return view('purchases.Finance.form', compact('purchase_requests','colour','Location','Ship', "Prefixe",'master_item','satuan', 'Grade'));
    }

    public function create_wirehouse(){
        $colour = Colour::get();
        $purchase_requests = PurchaseRequest::with('Prefixe');
        $Location = location::get();
        $Ship = ships::get();
        $Prefixe = Prefix::get();
        $master_item = Master_Item::get();
        $satuan = Satuan::get();
        $Grade = Grade::get();
        $color = Supplier::get();
        $Powder = powder::get();
        
        return view('purchases.Wirehouse.form', compact('purchase_requests','colour','Location','Ship', "Prefixe",'master_item','satuan', 'Grade'));
    }


    // *******************
    //     Store Other Good
    // ********************
    public function item_store(Request $request){


        $validateData = $request->validate([
            'deadline_date'=>'required',
            'requester'=>'required|max:100',
            // 'project'=>'required|max:100',
            'attachment' => 'mimes:jpeg,img,jpg,png,pdf|max:20000',
            'locations_id' => 'required',
            'prefixes_id' => 'required',
            'ships_id' => 'required',
            // 'id_master_item' => 'required',
            // 'id_satuan' =>'required'

        ], [
            'deadline_date.required'=>"Deadline Date field is required ",
            'requester.required'=>"Requester field is required ",
            'project.required'=>"Project field is required ",
            'locations_id.required' => "Lokasi field is required",
            'prefixes_id.required' => "Divisi field is required",
            'ships_id.required' => "Kebutuhan/pengiriman field is required",
            'id_master_item.required'=>"Item field is required ",
            'id_satuan.required'=>"Satuan field is required "
        ]);
        if($request->hasFile('attachment'))
        {
            $destination_path = 'public';
            $image = $request->file('attachment');
            $image_name = rand(0,99).rand(0,99)."_".$image->getClientOriginalName();
            $path = $request -> file('attachment')->storeAs($destination_path,$image_name);

            $purchase_requests = PurchaseRequest::create([
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
        else
        {
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
            foreach ((array)$request->addMoreInputFields as $key => $value) {
            
                $item = Item::create($value);
                $request_id = $item->id;
                $request_now = Item::find($request_id);
                $purchase_requests->item()->attach($request_now);
            }
           
        return redirect('/purchase_request')->with('success', 'Berhasil menambah data');
    }


    public function item_store_sales(Request $request){


        $validateData = $request->validate([
            'deadline_date'=>'required',
            'requester'=>'required|max:100',
            // 'project'=>'required|max:100',
            'attachment' => 'mimes:jpeg,img,jpg,png,pdf|max:20000',
            'locations_id' => 'required',
            'prefixes_id' => 'required',
            'ships_id' => 'required',
            // 'id_master_item' => 'required',
            // 'id_satuan' =>'required'

        ], [
            'deadline_date.required'=>"Deadline Date field is required ",
            'requester.required'=>"Requester field is required ",
            'project.required'=>"Project field is required ",
            'locations_id.required' => "Lokasi field is required",
            'prefixes_id.required' => "Divisi field is required",
            'ships_id.required' => "Kebutuhan/pengiriman field is required",
            'id_master_item.required'=>"Item field is required ",
            'id_satuan.required'=>"Satuan field is required "
        ]);
        if($request->hasFile('attachment'))
        {
            $destination_path = 'public';
            $image = $request->file('attachment');
            $image_name = rand(0,99).rand(0,99)."_".$image->getClientOriginalName();
            $path = $request -> file('attachment')->storeAs($destination_path,$image_name);

            $purchase_requests = PurchaseRequest::create([
                'deadline_date'=>$request->deadline_date,
                'role' => 'sales',
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
        else
        {
            $purchase_requests = PurchaseRequest::create([
                // 'no_pr'=>$request->no_pr,
                'deadline_date'=>$request->deadline_date,
                'role' => 'sales',
                'type'=>$request->type,
                'requester'=>$request->requester,
                'prefixes_id'=>$request->prefixes_id,
                'project'=>$request->project,
                'locations_id'=>$request->locations_id,
                'ships_id'=>$request->ships_id,
                'note'=>$request->note,
            ]);

        }
            foreach ((array)$request->addMoreInputFields as $key => $value) {
            
                $item = Item::create($value);
                $request_id = $item->id;
                $request_now = Item::find($request_id);
                $purchase_requests->item()->attach($request_now);
            }
           
        return redirect('sales/purchase_request')->with('success', 'Berhasil menambah data');
    }
    

     public function item_store_finance(Request $request){


        $validateData = $request->validate([
            'deadline_date'=>'required',
            'requester'=>'required|max:100',
            // 'project'=>'required|max:100',
            'attachment' => 'mimes:jpeg,img,jpg,png,pdf|max:20000',
            'locations_id' => 'required',
            'prefixes_id' => 'required',
            'ships_id' => 'required',
            // 'id_master_item' => 'required',
            // 'id_satuan' =>'required'

        ], [
            'deadline_date.required'=>"Deadline Date field is required ",
            'requester.required'=>"Requester field is required ",
            'project.required'=>"Project field is required ",
            'locations_id.required' => "Lokasi field is required",
            'prefixes_id.required' => "Divisi field is required",
            'ships_id.required' => "Kebutuhan/pengiriman field is required",
            'id_master_item.required'=>"Item field is required ",
            'id_satuan.required'=>"Satuan field is required "
        ]);
        if($request->hasFile('attachment'))
        {
            $destination_path = 'public';
            $image = $request->file('attachment');
            $image_name = rand(0,99).rand(0,99)."_".$image->getClientOriginalName();
            $path = $request -> file('attachment')->storeAs($destination_path,$image_name);

            $purchase_requests = PurchaseRequest::create([
                'deadline_date'=>$request->deadline_date,
                'type'=>$request->type,
                'requester'=>$request->requester,
                'role' => 'finance',
                'prefixes_id'=>$request->prefixes_id,
                'project'=>$request->project,
                'locations_id'=>$request->locations_id,
                'ships_id'=>$request->ships_id,
                'note'=>$request->note,
                'attachment'=>$image_name,
            ]);
        }
        else
        {
            $purchase_requests = PurchaseRequest::create([
                // 'no_pr'=>$request->no_pr,
                'deadline_date'=>$request->deadline_date,
                'role' => 'finance',
                'type'=>$request->type,
                'requester'=>$request->requester,
                'prefixes_id'=>$request->prefixes_id,
                'project'=>$request->project,
                'locations_id'=>$request->locations_id,
                'ships_id'=>$request->ships_id,
                'note'=>$request->note,
            ]);

        }
            foreach ((array)$request->addMoreInputFields as $key => $value) {
            
                $item = Item::create($value);
                $request_id = $item->id;
                $request_now = Item::find($request_id);
                $purchase_requests->item()->attach($request_now);
            }
           
        return redirect('finance/purchase_request')->with('success', 'Berhasil menambah data');
    }

    public function item_store_wirehouse(Request $request){


        $validateData = $request->validate([
            'deadline_date'=>'required',
            'requester'=>'required|max:100',
            // 'project'=>'required|max:100',
            'attachment' => 'mimes:jpeg,img,jpg,png,pdf|max:20000',
            'locations_id' => 'required',
            'prefixes_id' => 'required',
            'ships_id' => 'required',
            // 'id_master_item' => 'required',
            // 'id_satuan' =>'required'

        ], [
            'deadline_date.required'=>"Deadline Date field is required ",
            'requester.required'=>"Requester field is required ",
            'project.required'=>"Project field is required ",
            'locations_id.required' => "Lokasi field is required",
            'prefixes_id.required' => "Divisi field is required",
            'ships_id.required' => "Kebutuhan/pengiriman field is required",
            'id_master_item.required'=>"Item field is required ",
            'id_satuan.required'=>"Satuan field is required "
        ]);
        if($request->hasFile('attachment'))
        {
            $destination_path = 'public';
            $image = $request->file('attachment');
            $image_name = rand(0,99).rand(0,99)."_".$image->getClientOriginalName();
            $path = $request -> file('attachment')->storeAs($destination_path,$image_name);

            $purchase_requests = PurchaseRequest::create([
                'deadline_date'=>$request->deadline_date,
                'type'=>$request->type,
                'role' => 'wirehouse',
                'requester'=>$request->requester,
                'prefixes_id'=>$request->prefixes_id,
                'project'=>$request->project,
                'locations_id'=>$request->locations_id,
                'ships_id'=>$request->ships_id,
                'note'=>$request->note,
                'attachment'=>$image_name,
            ]);
        }
        else
        {
            $purchase_requests = PurchaseRequest::create([
                // 'no_pr'=>$request->no_pr,
                'deadline_date'=>$request->deadline_date,
                'role' => 'wirehouse',
                'type'=>$request->type,
                'requester'=>$request->requester,
                'prefixes_id'=>$request->prefixes_id,
                'project'=>$request->project,
                'locations_id'=>$request->locations_id,
                'ships_id'=>$request->ships_id,
                'note'=>$request->note,
            ]);

        }
            foreach ((array)$request->addMoreInputFields as $key => $value) {
            
                $item = Item::create($value);
                $request_id = $item->id;
                $request_now = Item::find($request_id);
                $purchase_requests->item()->attach($request_now);
            }
           
        return redirect('wirehouse/purchase_request')->with('success', 'Berhasil menambah data');
    }

    // *******************
    //     Store Powder
    // ********************
    public function powder_store(Request $request){
        $validateData = $request->validate([
            'deadline_date'=>'required',
            'requester'=>'required|max:100',
            // 'project'=>'required|max:100',
            'attachment' => 'mimes:jpeg,img,jpg,png,pdf|max:20000',
            'locations_id' => 'required',
            'prefixes_id' => 'required',
            'ships_id' => 'required',
            'grades_id' => 'required',
            'suppliers_id' => 'required',
            'warna' => 'required',
            'color_id' => 'required',
            'finish' => 'required',
            'finishing' => 'required',
            'quantity' => 'required',
            'm2' => 'required',
            'estimasi' => 'required',
            'fresh' => 'required',
            'recycle' => 'required',
            'alokasi' => 'required'

        ], [
            'deadline_date.required'=>"Tanggal Kebutuhan Barang Tiba field is required ",
            'requester.required'=>"Requester field is required ",
            'project.required'=>"Project field is required ",
            'attachment.required'=>"Attachment field is required ",
        ]);
        if($request->hasFile('attachment'))
        {
            $destination_path = 'public';
            $image = $request->file('attachment');
            $image_name = rand(0,99).rand(0,99)."_".$image->getClientOriginalName();
            $path = $request -> file('attachment')->move($destination_path,$image_name);

            $purchase_requests = PurchaseRequest::create([
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
        else
        {
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

        $powder = new powder;
        $powder->grades_id = $request->grades_id;
        $powder->suppliers_id = $request->suppliers_id;
        $powder->warna =$request->warna;
        $powder->color_id =$request->color_id;
        $powder->finish =$request->finish;
        $powder->finishing =$request->finishing;
        $powder->quantity =$request->quantity;
        $powder->m2 =$request->m2;
        $powder->estimasi =$request->estimasi;
        $powder->fresh =$request->fresh;
        $powder->recycle =$request->recycle;
        $powder->alokasi =$request->alokasi;
        $powder->save();

        $request_id = $powder->id;
        $request_now = powder::find($request_id);
        $purchase_requests->powder()->attach($request_now);

        return redirect('/purchase_request')->with('success', 'Berhasil menambah data status');

    }

    public function powder_store_sales(Request $request){
        $validateData = $request->validate([
            'deadline_date'=>'required',
            'requester'=>'required|max:100',
            // 'project'=>'required|max:100',
            'attachment' => 'mimes:jpeg,img,jpg,png,pdf|max:20000',
            'locations_id' => 'required',
            'prefixes_id' => 'required',
            'ships_id' => 'required',
            'grades_id' => 'required',
            'suppliers_id' => 'required',
            'warna' => 'required',
            'color_id' => 'required',
            'finish' => 'required',
            'finishing' => 'required',
            'quantity' => 'required',
            'm2' => 'required',
            'estimasi' => 'required',
            'fresh' => 'required',
            'recycle' => 'required',
            'alokasi' => 'required'

        ], [
            'deadline_date.required'=>"Tanggal Kebutuhan Barang Tiba field is required ",
            'requester.required'=>"Requester field is required ",
            'project.required'=>"Project field is required ",
            'attachment.required'=>"Attachment field is required ",
        ]);
        if($request->hasFile('attachment'))
        {
            $destination_path = 'storage';
            $image = $request->file('attachment');
            $image_name = rand(0,99).rand(0,99)."_".$image->getClientOriginalName();
            $path = $request -> file('attachment')->move($destination_path,$image_name);

            $purchase_requests = PurchaseRequest::create([
                'deadline_date'=>$request->deadline_date,
                'type'=>$request->type,
                'role' => 'sales',
                'requester'=>$request->requester,
                'prefixes_id'=>$request->prefixes_id,
                'project'=>$request->project,
                'locations_id'=>$request->locations_id,
                'ships_id'=>$request->ships_id,
                'note'=>$request->note,
                
                'attachment'=>$image_name,
            ]);
        }
        else
        {
            $purchase_requests = PurchaseRequest::create([
                // 'no_pr'=>$request->no_pr,
                'deadline_date'=>$request->deadline_date,
                'type'=>$request->type,
                'role' => 'sales',
                'requester'=>$request->requester,
                'prefixes_id'=>$request->prefixes_id,
                'project'=>$request->project,
                'locations_id'=>$request->locations_id,
                'ships_id'=>$request->ships_id,
                'note'=>$request->note,
            ]);

        }

        $powder = new powder;
        $powder->grades_id = $request->grades_id;
        $powder->suppliers_id = $request->suppliers_id;
        $powder->warna =$request->warna;
        $powder->color_id =$request->color_id;
        $powder->finish =$request->finish;
        $powder->finishing =$request->finishing;
        $powder->quantity =$request->quantity;
        $powder->m2 =$request->m2;
        $powder->estimasi =$request->estimasi;
        $powder->fresh =$request->fresh;
        $powder->recycle =$request->recycle;
        $powder->alokasi =$request->alokasi;
        $powder->save();

        $request_id = $powder->id;
        $request_now = powder::find($request_id);
        $purchase_requests->powder()->attach($request_now);

        return redirect('sales/purchase_request')->with('success', 'Berhasil menambah data status');

    }

    public function powder_store_finance(Request $request){
        $validateData = $request->validate([
            'deadline_date'=>'required',
            'requester'=>'required|max:100',
            // 'project'=>'required|max:100',
            'attachment' => 'mimes:jpeg,img,jpg,png,pdf|max:20000',
            'locations_id' => 'required',
            'prefixes_id' => 'required',
            'ships_id' => 'required',
            'grades_id' => 'required',
            'suppliers_id' => 'required',
            'warna' => 'required',
            'color_id' => 'required',
            'finish' => 'required',
            'finishing' => 'required',
            'quantity' => 'required',
            'm2' => 'required',
            'estimasi' => 'required',
            'fresh' => 'required',
            'recycle' => 'required',
            'alokasi' => 'required'

        ], [
            'deadline_date.required'=>"Tanggal Kebutuhan Barang Tiba field is required ",
            'requester.required'=>"Requester field is required ",
            'project.required'=>"Project field is required ",
            'attachment.required'=>"Attachment field is required ",
        ]);
        if($request->hasFile('attachment'))
        {
            $destination_path = 'storage';
            $image = $request->file('attachment');
            $image_name = rand(0,99).rand(0,99)."_".$image->getClientOriginalName();
            $path = $request -> file('attachment')->move($destination_path,$image_name);

            $purchase_requests = PurchaseRequest::create([
                'deadline_date'=>$request->deadline_date,
                'type'=>$request->type,
                'role' => 'finance',
                'requester'=>$request->requester,
                'prefixes_id'=>$request->prefixes_id,
                'project'=>$request->project,
                'locations_id'=>$request->locations_id,
                'ships_id'=>$request->ships_id,
                'note'=>$request->note,
                
                'attachment'=>$image_name,
            ]);
        }
        else
        {
            $purchase_requests = PurchaseRequest::create([
                // 'no_pr'=>$request->no_pr,
                'deadline_date'=>$request->deadline_date,
                'type'=>$request->type,
                'role' => 'finance',
                'requester'=>$request->requester,
                'prefixes_id'=>$request->prefixes_id,
                'project'=>$request->project,
                'locations_id'=>$request->locations_id,
                'ships_id'=>$request->ships_id,
                'note'=>$request->note,
            ]);

        }

        $powder = new powder;
        $powder->grades_id = $request->grades_id;
        $powder->suppliers_id = $request->suppliers_id;
        $powder->warna =$request->warna;
        $powder->color_id =$request->color_id;
        $powder->finish =$request->finish;
        $powder->finishing =$request->finishing;
        $powder->quantity =$request->quantity;
        $powder->m2 =$request->m2;
        $powder->estimasi =$request->estimasi;
        $powder->fresh =$request->fresh;
        $powder->recycle =$request->recycle;
        $powder->alokasi =$request->alokasi;
        $powder->save();

        $request_id = $powder->id;
        $request_now = powder::find($request_id);
        $purchase_requests->powder()->attach($request_now);

        return redirect('finance/purchase_request')->with('success', 'Berhasil menambah data status');

    }

    public function powder_store_wirehouse(Request $request){
        $validateData = $request->validate([
            'deadline_date'=>'required',
            'requester'=>'required|max:100',
            // 'project'=>'required|max:100',
            'attachment' => 'mimes:jpeg,img,jpg,png,pdf|max:20000',
            'locations_id' => 'required',
            'prefixes_id' => 'required',
            'ships_id' => 'required',
            'grades_id' => 'required',
            'suppliers_id' => 'required',
            'warna' => 'required',
            'color_id' => 'required',
            'finish' => 'required',
            'finishing' => 'required',
            'quantity' => 'required',
            'm2' => 'required',
            'estimasi' => 'required',
            'fresh' => 'required',
            'recycle' => 'required',
            'alokasi' => 'required'

        ], [
            'deadline_date.required'=>"Tanggal Kebutuhan Barang Tiba field is required ",
            'requester.required'=>"Requester field is required ",
            'project.required'=>"Project field is required ",
            'attachment.required'=>"Attachment field is required ",
        ]);
        if($request->hasFile('attachment'))
        {
            $destination_path = 'storage';
            $image = $request->file('attachment');
            $image_name = rand(0,99).rand(0,99)."_".$image->getClientOriginalName();
            $path = $request -> file('attachment')->move($destination_path,$image_name);

            $purchase_requests = PurchaseRequest::create([
                'deadline_date'=>$request->deadline_date,
                'type'=>$request->type,
                'role' => 'wirehouse',
                'requester'=>$request->requester,
                'prefixes_id'=>$request->prefixes_id,
                'project'=>$request->project,
                'locations_id'=>$request->locations_id,
                'ships_id'=>$request->ships_id,
                'note'=>$request->note,
                
                'attachment'=>$image_name,
            ]);
        }
        else
        {
            $purchase_requests = PurchaseRequest::create([
                // 'no_pr'=>$request->no_pr,
                'deadline_date'=>$request->deadline_date,
                'type'=>$request->type,
                'role' => 'wirehouse',
                'requester'=>$request->requester,
                'prefixes_id'=>$request->prefixes_id,
                'project'=>$request->project,
                'locations_id'=>$request->locations_id,
                'ships_id'=>$request->ships_id,
                'note'=>$request->note,
            ]);

        }

        $powder = new powder;
        $powder->grades_id = $request->grades_id;
        $powder->suppliers_id = $request->suppliers_id;
        $powder->warna =$request->warna;
        $powder->color_id =$request->color_id;
        $powder->finish =$request->finish;
        $powder->finishing =$request->finishing;
        $powder->quantity =$request->quantity;
        $powder->m2 =$request->m2;
        $powder->estimasi =$request->estimasi;
        $powder->fresh =$request->fresh;
        $powder->recycle =$request->recycle;
        $powder->alokasi =$request->alokasi;
        $powder->save();

        $request_id = $powder->id;
        $request_now = powder::find($request_id);
        $purchase_requests->powder()->attach($request_now);

        return redirect('wirehouse/purchase_request')->with('success', 'Berhasil menambah data status');

    }

    public function edit($id){
        $Supplier = Supplier::get();
        $Grade = Grade::get();
        $purchase_requests = PurchaseRequest::findOrFail($id);
        $colour = Colour::get();
        $Location = location::get();
        $Ship = ships::get();
        $satuan = Satuan::get();
        $master_item = Master_Item::get();
        $Prefixe = Prefix::get();

        return view('purchases.edit', compact('satuan', 'master_item', 'Supplier', 'Grade', 'colour', 'purchase_requests', 'Location', 'Ship', 'Prefixe'));
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

    public function view($id){
        $purchase_requests = PurchaseRequest::find($id);
        $item = Item::with('master_item','satuan')->get();


        $Location=location::get();
        $Ship=ships::get();
        $Prefixe=Prefix::get();
        $Grade = Grade::get();
        $Supplier = Supplier::get();

        return view('view', compact('purchase_requests', 'Location', 'Ship', 'Prefixe','item', 'Grade', 'Supplier'));
    }
    public function view_reject($id){
        $purchase_requests = PurchaseRequest::find($id);
        $item = Item::with('master_item','satuan')->get();


        $Location=location::get();
        $Ship=ships::get();
        $Prefixe=Prefix::get();
        $Grade = Grade::get();
        $Supplier = Supplier::get();

        return view('purchases.reject', compact('purchase_requests', 'Location', 'Ship', 'Prefixe','item', 'Grade', 'Supplier'));
    }

    public function detail($id){
        $purchase_requests = PurchaseRequest::find($id);
        $powder = powder::with('grade','supplier')->get();

       

        $Location=location::get();
        $Ship=ships::get();
        $Prefixe=Prefix::get();
        $Grade = Grade::get();
        $Supplier = Supplier::get();

        return view('detail', compact('purchase_requests', 'Location', 'Ship', 'Prefixe', 'Grade', 'Supplier'));
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
        if($request->hasFile('attachment'))
        {
            $destination_path = 'storage';
            $image = $request->file('attachment');
            $image_name = rand(0,99).rand(0,99)."_".$image->getClientOriginalName();
            $path = $request -> file('attachment')->move($destination_path,$image_name);
            $name = 'pending';

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
            'attachment'=>$image_name ?? $purchase_requests->attachment,
            'approval_status' => $name,
            'accept_status' => $name
            
        ]);
        if($purchase_requests->role == 'sales')
        {
            return redirect('sales/purchase_request')->with('teredit', 'Berhasil mengedit data barang');
        }
        else if($purchase_requests->role == 'finance')
        {
            return redirect('finance/purchase_request')->with('teredit', 'Berhasil mengedit data barang');
        }
        else if($purchase_requests->role == 'finance')
        {
            return redirect('wirehouse/purchase_request')->with('teredit', 'Berhasil mengedit data barang');
        }
        else
        {
            return redirect('/purchase_request')->with('teredit', 'Berhasil mengedit data barang');
        }
    
        }

        else{
            $destination_path = 'storage';
            $image = $request->file('attachment');
            $image_name = rand(0,99).rand(0,99)."_".$image->getClientOriginalName();
            $path = $request -> file('attachment')->move($destination_path,$image_name);
            $name = 'pending';
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
            'approval_status' => $name,
            'accept_status' => $name
            // 'attachment'=>$request->attachment ?? $purchase_requests->attachment,
            
        ]);
        if($purchase_requests->role == 'sales')
        {
            return redirect('sales/purchase_request')->with('teredit', 'Berhasil mengedit data barang');
        }
        else if($purchase_requests->role == 'finance')
        {
            return redirect('finance/purchase_request')->with('teredit', 'Berhasil mengedit data barang');
        }
        else if($purchase_requests->role == 'finance')
        {
            return redirect('wirehouse/purchase_request')->with('teredit', 'Berhasil mengedit data barang');
        }
        else
        {
            return redirect('/purchase_request')->with('teredit', 'Berhasil mengedit data barang');
        }

        }
        
        

    }

    public function destroy($id){

        $purchase_requests = PurchaseRequest::findOrFail($id);
        $purchase_requests->delete();

        // alert()->question('Are you sure?','You won\'t be able to revert this!')->showCancelButton();
        return redirect("/purchase_request")->with('terhapus', 'Purchase Request berhasil dihapus!');
     }

    public function show($id){

        
    }


    public function create_location(){
        return view('purchases.location.add');
    }

    public function store_location(Request $request)
    {
        

        $location = Location::create([
            'location_name' => $request->location_name,
            'address' => $request->address
        ]);

        return redirect('/purchase_request/create');
    }

    public function read_location(Request $request)
    {
        $Location = Location::get();

        return view('purchases.location.read', compact('Location'));
    }



    public function create_supplier(){
        return view('purchases.supplier.add');
    }

    public function store_supplier(Request $request)
    {
        

        $Supplier = Supplier::create([
            'vendor' => $request->vendor,
        ]);

        return redirect('/purchase_request/create');
    }

    public function read_supplier(Request $request)
    {
        $Supplier = Supplier::get();

        return view('purchases.supplier.read', compact('Supplier'));
    }


    public function create_color(){
        return view('purchases.color.add');
    }

    public function store_color(Request $request)
    {
        

        $colour = Colour::create([
            'name' => $request->name,
        ]);

        return redirect('/purchase_request/create');
    }

    public function read_color(Request $request)
    {
        $colour = Colour::get();

        return view('purchases.color.read', compact('colour'));
    }

    
    // prefix
    public function create_prefix(){
        return view('purchases.prefix.add');
    }

    public function store_prefix(Request $request)
    {
        

        $Prefixe = Prefix::create([
            'prefix' => $request->prefix,
            'divisi' => $request->divisi,
        ]);

        return redirect('/purchase_request/create');
    }

    public function read_prefix(Request $request)
    {
        $Prefixe = Prefix::get();

        return view('purchases.prefix.read', compact('Prefixe'));
    }

    // grade
    public function create_grade(){
        return view('purchases.grade.add');
    }

    public function store_grade(Request $request)
    {
        

        $Grade = Grade::create([
            'tipe' => $request->tipe,
        ]);

        return redirect('/purchase_request/create');
    }

    public function read_grade(Request $request)
    {
        $Grade = Grade::get();

        return view('purchases.grade.read', compact('Grade'));
    }

    // ships
    public function create_ships(){
        return view('purchases.ships.add');
    }

    public function store_ships(Request $request)
    {
        $Ship = New ships;
        $Ship->tipe = $request->tipe;
        $Ship->save();
        return redirect('/purchase_request/create');
    }

    public function read_ships(Request $request)
    {
        $Ship = ships::get();

        return view('purchases.ships.read', compact('Ship'));
    }

    // item
    public function create_item(){
        return view('purchases.item.add');
    }

    public function store_item(Request $request)
    {
        $master_item = New Master_Item;
        $master_item->item_name = $request->item_name;
        $master_item->save();
        return redirect('/purchase_request/create');
    }

    public function read_item(Request $request)
    {
        $master_item = Master_Item::get();

        return view('purchases.item.read', compact('master_item'));
    }

    // unit
    public function create_unit(){
        return view('purchases.unit.add');
    }

    public function store_unit(Request $request)
    {
        $satuan = New Satuan;
        $satuan->name = $request->name;
        $satuan->unit = $request->unit;
        $satuan->save();
        return redirect('/purchase_request/create');
    }

    public function read_unit(Request $request)
    {
        $satuan = Satuan::get();

        return view('purchases.unit.read', compact('satuan'));
    }
}
