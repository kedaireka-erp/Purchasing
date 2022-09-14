<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\location;
use App\Models\ships;
use App\Models\Prefix;
use App\Models\PurchaseRequest;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {
        $purchase_requests = PurchaseRequest::where('approval_status','approve')->get();
        $items = Item::with('master_item','satuan')->get();

        $Location=location::get();
        $Ship=ships::get();
        $Prefixe=Prefix::get();

        return view('Tracking.dashboard', compact('items','purchase_requests','Location','Ship','Prefixe'));
    }
}
