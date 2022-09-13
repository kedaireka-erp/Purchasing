<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\PurchaseRequest;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {
        $purchase_requests = PurchaseRequest::all();
        $items = Item::find(1);
        $items->purchase()->attach($purchase_requests);

        return view('Tracking.dashboard', compact('items'));
    }
}
