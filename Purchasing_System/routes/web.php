<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\FormPOController;
use App\Http\Controllers\PowderController;
use App\Http\Controllers\PrefixController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\ships_controller;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ColourController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\MasterItemController;
use App\Http\Controllers\TimeshippingController;
use App\Http\Controllers\PurchaseRequestController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| rout3es are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware("auth")->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/manager', [HomeController::class, 'manager'])->name('manager');
    Route::get('/purchasing', [HomeController::class, 'purchasing'])->name('purchasing');

    Route::group(['as' => 'satuan.', 'prefix' => 'satuan'], function () {
        Route::get('/', [SatuanController::class, 'index'])->name('satuandash');
        Route::get('/search', [SatuanController::class, 'search'])->name('satuansearch');
        Route::get('/add', [SatuanController::class, 'add'])->name('satuanadd');
        Route::post('/store', [SatuanController::class, 'store'])->name('satuanstore');
        Route::get('/edit/{id}', [SatuanController::class, 'edit'])->name('satuanedit');
        Route::post('/update/{id}', [SatuanController::class, 'update'])->name('satuanupdate');
        Route::delete('/delete/{id}', [SatuanController::class, 'destroy'])->name('satuandelete');
        Route::get("/download", [SatuanController::class, "excel"])->name("download");
        Route::get('/view/{id}', [SatuanController::class, "view"])->name("view");
    });

    Route::group(['as' => 'prefix.', 'prefix' => 'prefix'], function () {
        Route::get('/', [PrefixController::class, 'index'])->name('prefixdash');
        Route::get('/search', [PrefixController::class, 'search'])->name('prefixsearch');
        Route::get('/add', [PrefixController::class, 'add'])->name('prefixadd');
        Route::post('/store', [PrefixController::class, 'store'])->name('prefixstore');
        Route::get('/edit/{id}', [PrefixController::class, 'edit'])->name('prefixedit');
        Route::post('/update/{id}', [PrefixController::class, 'update'])->name('prefixupdate');
        Route::delete('/delete/{id}', [PrefixController::class, 'destroy'])->name('prefixdelete');
        Route::get("/download", [PrefixController::class, "excel"])->name("download");
        Route::get('/view/{id}', [PrefixController::class, "view"])->name("view");
    });

    Route::group(['as' => 'location.', 'prefix' => 'location'], function () {
        Route::get('/', [LocationController::class, "index"]);
        Route::get('/create', [LocationController::class, "create"])->name('create');
        Route::post('/store', [LocationController::class, "store"])->name("store");
        Route::get('/edit/{id}', [LocationController::class, "edit"])->name("edit");
        Route::post('/update{id}', [LocationController::class, "update"])->name("update");
        Route::delete('/destroy{id}', [LocationController::class, "destroy"])->name("destroy");
        Route::get("/download", [LocationController::class, "excel"])->name("download");
        Route::get('/view/{id}', [LocationController::class, "view"])->name("view");
    });

    route::resource('ships', ships_controller::class);
    Route::get("/exceldownload", [ships_Controller::class, "excel"])->name("download");

    Route::group(['as' => 'master_item.', 'prefix' => 'masteritem'], function () {
        // Route::get('/create', function () {
        //     return view('master_item.create');
        // });

        Route::get("/", [MasterItemController::class, "index"]);
        route::get('/create', [MasterItemController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [MasterItemController::class, 'edit'])->name("miupdate");
        Route::delete('/delete/{id}', [MasterItemController::class, 'delete'])->name("midelete");
        Route::post('/store', [MasterItemController::class, "store"]);
        Route::post('/update/{id}', [MasterItemController::class, 'update'])->name("update");;
        Route::get("/search", [MasterItemController::class, "cari"]);
        Route::get("/download", [MasterItemController::class, "excel"])->name("download");
        Route::get('/view/{id}', [MasterItemController::class, "view"])->name("view");
    });

    route::group(['as' => 'payment.', 'prefix' => 'payment'], function () {
        route::get('/', [PaymentController::class, 'index']);
        route::get('/create', [PaymentController::class, 'create'])->name('create');
        route::post('/store', [PaymentController::class, 'store'])->name('store');
        route::get('/edit/{id}', [PaymentController::class, 'edit'])->name('edit');
        route::post('/update/{id}', [PaymentController::class, 'update'])->name('update');
        route::delete('destroy/{id}', [PaymentController::class, 'destroy'])->name('destroy');
        Route::get("/download", [PaymentController::class, "excel"])->name("download");
        route::get('/view/{id}', [PaymentController::class, 'view'])->name('view');
    });




    Route::group(['as' => 'purchase_request.', 'prefix' => 'purchase_request'], function () {
        Route::get('/', [PurchaseRequestController::class, 'index']);
        Route::get('/detail/{id}', [PurchaseRequestController::class, 'detail'])->name('detail');
        Route::get('/create', [PurchaseRequestController::class, "create"])->name('create');


        Route::get('/create/location', [PurchaseRequestController::class, "create_location"])->name('create_location');
        Route::get('/create/location/read', [PurchaseRequestController::class, "read_location"])->name('read_location');
        Route::post('purchase_request/create/location/store', [PurchaseRequestController::class, "store_location"])->name('store_location');

        Route::get('/create/supplier', [PurchaseRequestController::class, "create_supplier"])->name('create_supplier');
        Route::get('/create/supplier/read', [PurchaseRequestController::class, "read_supplier"])->name('read_supplier');
        Route::post('purchase_request/create/supplier/store', [PurchaseRequestController::class, "store_supplier"])->name('store_supplier');


        Route::get('/create/color', [PurchaseRequestController::class, "create_color"])->name('create_color');
        Route::get('/create/color/read', [PurchaseRequestController::class, "read_color"])->name('read_color');
        Route::post('purchase_request/create/color/store', [PurchaseRequestController::class, "store_color"])->name('store_color');

        Route::get('/create/prefix', [PurchaseRequestController::class, "create_prefix"])->name('create_prefix');
        Route::get('/create/prefix/read', [PurchaseRequestController::class, "read_prefix"])->name('read_prefix');
        Route::post('purchase_request/create/prefix/store', [PurchaseRequestController::class, "store_prefix"])->name('store_prefix');

        Route::get('/create/grade', [PurchaseRequestController::class, "create_grade"])->name('create_grade');
        Route::get('/create/grade/read', [PurchaseRequestController::class, "read_grade"])->name('read_grade');
        Route::post('purchase_request/create/grade/store', [PurchaseRequestController::class, "store_grade"])->name('store_grade');

        Route::get('/create/ships', [PurchaseRequestController::class, "create_ships"])->name('create_ships');
        Route::get('/create/ships/read', [PurchaseRequestController::class, "read_ships"])->name('read_ships');
        Route::post('purchase_request/create/ships/store', [PurchaseRequestController::class, "store_ships"])->name('store_ships');

        Route::get('/create/item', [PurchaseRequestController::class, "create_item"])->name('create_item');
        Route::get('/create/item/read', [PurchaseRequestController::class, "read_item"])->name('read_item');
        Route::post('purchase_request/create/item/store', [PurchaseRequestController::class, "store_item"])->name('store_item');

        Route::get('/create/unit', [PurchaseRequestController::class, "create_unit"])->name('create_unit');
        Route::get('/create/unit/read', [PurchaseRequestController::class, "read_unit"])->name('read_unit');
        Route::post('purchase_request/create/unit/store', [PurchaseRequestController::class, "store_unit"])->name('store_unit');



        Route::post('/storegood', [PurchaseRequestController::class, "item_store"])->name("storegood");
        Route::post('/storepowder', [PurchaseRequestController::class, "powder_store"])->name("storepowder");
        Route::get('/view/{id}', [PurchaseRequestController::class, "view"])->name("view");
        Route::get('/view/reject/{id}', [PurchaseRequestController::class, "view_reject"])->name("view_reject");
        Route::get('/additem/{id}', [PurchaseRequestController::class, "plus"])->name("plus");
        Route::post('/storeitem/{id}', [PurchaseRequestController::class, 'storeplus'])->name("storeplus");
         Route::get('/view/reject/{id}', [PurchaseRequestController::class, "view_reject"])->name("view_reject");
        Route::get('/edit/{id}', [PurchaseRequestController::class, "edit"])->name("edit");
        Route::post('/update{id}', [PurchaseRequestController::class, "update"])->name("update");
        Route::post('/updategood/{id}', [HomeController::class, "update_good"])->name("update_good");
        Route::post('/updatepowder/{id}', [HomeController::class, "update_powder"])->name("update_powder");
        Route::delete('/destroy/{id}', [PurchaseRequestController::class, "destroy"])->name("destroy");
    });


    Route::get('/Othergood', [HomeController::class, 'coba'])->name('coba');

    Route::get('/formPO', [FormPOController::class, 'indexPO'])->name('formPO');

    // route::group(['as' => 'tracking.', 'prefix' => 'tracking'], function () {
    //     route::get('/', [TrackingController::class, 'index']);
    //     route::get('/create', [TrackingController::class, 'create'])->name('create');
    //     route::post('/store', [TrackingController::class, 'store'])->name('store');
    //     route::get('/edit/{id}', [TrackingController::class, 'edit'])->name('edit');
    //     route::post('/update/{id}', [TrackingController::class, 'update'])->name('update');
    //     route::post('/update_good/{id}', [TrackingController::class, 'update_good'])->name('update_good');
    //     route::delete('destroy/{id}', [TrackingController::class, 'destroy'])->name('destroy');
    //     route::get('/view/{id}', [TrackingController::class, 'view'])->name('view');
    //     route::get('/detail/{id}', [TrackingController::class, 'detail'])->name('detail');
    //     Route::get('/approval', [PurchaseRequestController::class, 'track']);

    // });
    route::group(['as' => 'tracking.', 'prefix' => 'tracking'], function () {
        route::get('/good', [TrackingController::class, 'index_good']);
        route::get('/powder', [TrackingController::class, 'index_powder']);
        route::get('/create', [TrackingController::class, 'create'])->name('create');
        route::post('/store', [TrackingController::class, 'store'])->name('store');
        route::get('/edit/{id}', [TrackingController::class, 'edit'])->name('edit');
        route::post('/update/{id}', [TrackingController::class, 'update'])->name('update');
        route::post('/update_good/{id}', [TrackingController::class, 'update_good'])->name('update_good');
        route::post('/update_Tpowder/{id}', [TrackingController::class, 'update_Tpowder'])->name('update_Tpowder');
        route::delete('destroy/{id}', [TrackingController::class, 'destroy'])->name('destroy');
        route::get('/view/{id}', [TrackingController::class, 'view'])->name('view');
        route::get('/detail/{id}', [TrackingController::class, 'detail'])->name('detail');
        route::get('/detail_powders/{id}', [TrackingController::class, 'detail_powders'])->name('detail_powders');
        Route::get('/approval', [PurchaseRequestController::class, 'track']);
        Route::get('/dl', [TrackingController::class, 'dl'])->name('dl');;
    });


    route::group(['as' => 'grade.', 'prefix' => 'grade'], function () {
        route::get('/', [GradeController::class, 'index']);
        route::get('/create', [GradeController::class, 'create'])->name('create');
        route::post('/store', [GradeController::class, 'store'])->name('store');
        route::get('/edit/{id}', [GradeController::class, 'edit'])->name('edit');
        route::get('/view/{id}', [GradeController::class, 'view'])->name('view');
        route::post('/update/{id}', [GradeController::class, 'update'])->name('update');
        route::delete('destroy/{id}', [GradeController::class, 'destroy'])->name('destroy');
        Route::get("/download", [GradeController::class, "excel"])->name("download");
    });

    route::group(['as' => 'supplier.', 'prefix' => 'supplier'], function () {
        route::get('/', [SupplierController::class, 'index']);
        route::get('/create', [SupplierController::class, 'create'])->name('create');
        route::post('/store', [SupplierController::class, 'store'])->name('store');
        route::get('/edit/{id}', [SupplierController::class, 'edit'])->name('edit');
        route::post('/update/{id}', [SupplierController::class, 'update'])->name('update');
        route::delete('destroy/{id}', [SupplierController::class, 'destroy'])->name('destroy');
        Route::get("/download", [SupplierController::class, "excel"])->name("download");
        route::get('/view/{id}', [SupplierController::class, 'view'])->name('view');
    });

    route::group(['as' => 'powder.', 'prefix' => 'powder'], function () {
        route::get('/', [PowderController::class, 'index']);
        route::get('/create', [PowderController::class, 'create'])->name('create');
        route::post('/store', [PowderController::class, 'store'])->name('store');
        route::get('/edit/{id}', [PowderController::class, 'edit'])->name('edit');
        route::post('/update/{id}', [PowderController::class, 'update'])->name('update');
        route::delete('destroy/{id}', [PowderController::class, 'destroy'])->name('destroy');
    });

    route::group(['as' => 'colour.', 'prefix' => 'colour'], function () {
        route::get('/', [ColourController::class, 'index']);
        route::get('/create', [ColourController::class, 'create'])->name('create');
        route::post('/store', [ColourController::class, 'store'])->name('store');
        route::get('/edit/{id}', [ColourController::class, 'edit'])->name('edit');
        route::get('/view/{id}', [ColourController::class, 'view'])->name('view');
        Route::get("/download", [ColourController::class, "excel"])->name("download");
        route::post('/update/{id}', [ColourController::class, 'update'])->name('update');
        route::delete('destroy/{id}', [ColourController::class, 'destroy'])->name('destroy');
    });


    Route::group(['as' => 'approval.', 'prefix' => 'approval'], function () {
        Route::get('/', [HomeController::class, 'Approval']);
        Route::get('/done', [HomeController::class, 'approval_done']);
        Route::get('/reject', [HomeController::class, 'approval_reject']);
        Route::get('/accept', [HomeController::class, 'accept_page']);
        Route::get('/create/reject/{id}', [HomeController::class, 'create_reject']);
        Route::get('/accept/create/reject/{id}', [HomeController::class, 'create_accept_reject']);
        Route::post('create/reject/store/{id}', [HomeController::class, 'store_reject'])->name('reject_store');
        Route::post('accept/reject/store/{id}', [HomeController::class, 'store_accept_reject'])->name('accept_store');
        // Route::get('/accept/done', [HomeController::class, 'accept_page_done']);
        // Route::get('/accept/reject', [HomeController::class, 'accept_page_reject']);
        Route::get('/view/{id}', [HomeController::class, "view"])->name("view");
        Route::get('/purchase_view/{id}', [HomeController::class, "purchasing_view"])->name("purchasing_view");
        Route::get('/edit/{id}', [HomeController::class, "edit"])->name("edit");
        Route::get('/purchasing_edit/{id}', [HomeController::class, "purchasing_edit"])->name("purchasing_edit");
        Route::post('/updategood/{id}', [HomeController::class, "update_good"])->name("update_good");
        Route::post('/updatepowder/{id}', [HomeController::class, "update_powder"])->name("update_powder");
        Route::get('/accept/{id}', [HomeController::class, "accept"])->name("acceptpr");
        Route::post('/update/{id}', [HomeController::class, "update"])->name("updateApp");
        Route::post('/update/edit/{id}', [HomeController::class, "update_edit"])->name("updateEditApp");
        Route::post('/accepted/{id}', [HomeController::class, "update_accept"])->name("update_accept");
        Route::post('/accepted/edit/{id}', [HomeController::class, "update_accept_edit"])->name("update_accept_edit");
        Route::delete('/destroy{id}', [HomeController::class, "delete"])->name("deleteApp");
        Route::delete('/delete/{id}', [HomeController::class, 'delete_item'])->name("itemdelete");
    });

    route::group(['as' => 'timeshipping.', 'prefix' => 'timeshipping'], function () {
        route::get('/', [TimeshippingController::class, 'index']);
        route::get('/create', [TimeshippingController::class, 'create'])->name('create');
        route::post('/store', [TimeshippingController::class, 'store'])->name('store');
        route::get('/edit/{id}', [TimeshippingController::class, 'edit'])->name('edit');
        route::post('/update/{id}', [TimeshippingController::class, 'update'])->name('update');
        route::delete('destroy/{id}', [TimeshippingController::class, 'destroy'])->name('destroy');
        Route::get("/download", [TimeshippingController::class, "excel"])->name("download");
        route::get('/view/{id}', [TimeshippingController::class, 'view'])->name('view');
    });

    route::group(['as' => 'order.', 'prefix' => 'order'], function () {
        route::get('/', [OrderController::class, 'index']);
        route::get('/read/time', [OrderController::class, 'read_time']);
        route::get('/create/date', [OrderController::class, 'create_date']);
        route::get('/create/time', [OrderController::class, 'create_time']);
        route::get('/read/supplier', [OrderController::class, 'read_supplier']);
        route::get('/create/supplier', [OrderController::class, 'create_supplier']);
        route::get('/read/location', [OrderController::class, 'read_location']);
        route::get('/create/location', [OrderController::class, 'create_location']);
        route::get('/read/payment', [OrderController::class, 'read_payment']);
        route::get('/create/payment', [OrderController::class, 'create_payment']);
        route::post('order/create/supplier/store', [OrderController::class, 'store_supplier'])->name('supplierstore');
        route::post('order/create/location/store', [OrderController::class, 'store_location'])->name('locationstore');
        route::post('order/create/payment/store', [OrderController::class, 'store_payment'])->name('paymentstore');
        route::post('order/create/time/store', [OrderController::class, 'store_time'])->name('timestore');
        route::get('/create', [OrderController::class, 'create']);
        route::post('/store', [OrderController::class, 'store_item'])->name('orderstore');
        route::get('/view/{id}', [OrderController::class, 'view'])->name('view');
        route::get('/exportPDF/{id}', [OrderController::class, 'exportPDF'])->name('exportPDF');
        Route::delete('/destroy{id}', [OrderController::class, "destroy"])->name("destroyApp");
    });

    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
});

Route::get("login", [LoginController::class, "index"])->name("login");

Route::post("login", [LoginController::class, "login"]);

Route::post("/logout", [LoginController::class, "logout"])->name("logout");
