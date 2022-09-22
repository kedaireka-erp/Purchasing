<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormPOController extends Controller
{
    public function indexPO()
    {
        return view('PO.formpo');
    }
    public function formatPO()
    {
        return view('PO.formatPO');
    }
}
