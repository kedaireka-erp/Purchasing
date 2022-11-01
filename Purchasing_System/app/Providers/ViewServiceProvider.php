<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\PurchaseRequest;
use App\View\Composers\sidebarComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {

        // // Use following code if you want to use callback
        // // Based view composer instead of class based view composer
        // View::composer('sidebar.blade.php', function ($view) {

        //     // following code will create $posts variable which we can use
        //     // in our post.list view you can also create more variables if needed
        //     $view->with('purchase_requests', PurchaseRequest::orderByDesc('updated_at')->paginate(5));
        // });
    }
    public function register()
    {
        $this->composeSidebar();
    }

    public function composeSidebar()
    {
        view()->composer('layout.sidebar','App\Http\Composers\sidebarComposer');

    }
}