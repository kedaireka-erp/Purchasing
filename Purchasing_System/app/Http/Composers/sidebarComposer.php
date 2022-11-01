<?php

namespace App\Http\Composers;

use App\Models\notification;
use App\Models\PurchaseRequest;
use Illuminate\Contracts\View\View;

class sidebarComposer
{
    public function compose (View $view)
    {
        $view->with('notification', notification::orderBy('updated_at', 'DESC')->get());
        $view->with('count', notification::where('status', 'new')->count());
    }

}