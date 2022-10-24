<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index () {
        return redirect("http://erp.alluresystem.site");
    }

    public function login (Request $request) {
        Auth::loginUsingId(base64_decode($request->user_id));

        if( auth()->user()->hasRole('Sales') )
        {
            return redirect("/sales");
        }
        elseif( auth()->user()->hasRole('Finance') )
        {
            return redirect("/finance");
        }
        elseif( auth()->user()->hasRole('Wirehouse') )
        {
            return redirect("/wirehouse");
        }
        elseif( auth()->user()->hasRole('Manager Sales') )
        {
            return redirect("/manager_sales");
        }
        elseif( auth()->user()->hasRole('Manager Finance') )
        {
            return redirect("/manager_finance");
        }
        elseif( auth()->user()->hasRole('Manager Wirehouse') )
        {
            return redirect("/manager_wirehouse");
        }
        else
        {
            return redirect("/");
        }
       
    }

    public function logout () {
        Auth::logout();
        return redirect("http://erp.alluresystem.site");
    }
}
