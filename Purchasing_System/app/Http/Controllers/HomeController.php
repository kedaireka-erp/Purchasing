<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PurchaseRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.dashboard');
    }
    public function view()
    {
        return view('view');
    }
    public function coba()
    {
        return view('purchase.Othergood');
    }
    public function approval()
    {
        $purchase_requests=PurchaseRequest::paginate(5);
        return view('Approval.dashboard',compact("purchase_requests"));
    }
}
