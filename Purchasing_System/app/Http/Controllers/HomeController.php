<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
}
