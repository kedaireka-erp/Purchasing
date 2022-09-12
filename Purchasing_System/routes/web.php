<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\ships_controller;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MasterItemController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PrefixController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PurchaseRequestController;

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

Route::get('/', [HomeController::class, 'index'])->name('dashboard');
Route::get('/purchase', [PurchaseController::class, 'index'])->name('dashboard-purchase');

Route::group(['as' => 'satuan.', 'prefix' => 'satuan'], function () {
    Route::get('/', [SatuanController::class, 'index'])->name('satuandash');
    Route::get('/search', [SatuanController::class, 'search'])->name('satuansearch');
    Route::get('/add', [SatuanController::class, 'add'])->name('satuanadd');
    Route::post('/store', [SatuanController::class, 'store'])->name('satuanstore');
    Route::get('/edit/{id}', [SatuanController::class, 'edit'])->name('satuanedit');
    Route::post('/update/{id}', [SatuanController::class, 'update'])->name('satuanupdate');
    Route::delete('/delete/{id}', [SatuanController::class, 'destroy'])->name('satuandelete');
});

Route::group(['as' => 'prefix.', 'prefix' => 'prefix'], function () {
    Route::get('/', [PrefixController::class, 'index'])->name('prefixdash');
    Route::get('/search', [PrefixController::class, 'search'])->name('prefixsearch');
    Route::get('/add', [PrefixController::class, 'add'])->name('prefixadd');
    Route::post('/store', [PrefixController::class, 'store'])->name('prefixstore');
    Route::get('/edit/{id}', [PrefixController::class, 'edit'])->name('prefixedit');
    Route::post('/update/{id}', [PrefixController::class, 'update'])->name('prefixupdate');
    Route::delete('/delete/{id}', [PrefixController::class, 'destroy'])->name('prefixdelete');
});

Route::group(['as' => 'location.', 'prefix' => 'location'], function () {
    Route::get('/', [LocationController::class, "index"]);
    Route::get('/create', [LocationController::class, "create"])->name('create');
    Route::post('/store', [LocationController::class, "store"])->name("store");
    Route::get('/edit/{id}', [LocationController::class, "edit"])->name("edit");
    Route::post('/update{id}', [LocationController::class, "update"])->name("update");
    Route::delete('/destroy{id}', [LocationController::class, "destroy"])->name("destroy");
});

route::resource('ships', ships_controller::class);

Route::group(['as' => 'master_item.', 'prefix' => 'masteritem'], function () {
    Route::get('/create', function () {
        return view('master_item.create');
    });

    Route::get("/", [MasterItemController::class, "index"]);
    Route::get('/edit/{id}', [MasterItemController::class, 'edit'])->name("miupdate");
    Route::delete('/delete/{id}', [MasterItemController::class, 'delete'])->name("midelete");
    Route::post('/store', [MasterItemController::class, "store"]);
    Route::post('/update', [MasterItemController::class, 'update']);
    Route::get("/search", [MasterItemController::class, "cari"]);
});

route::group(['as' => 'payment.', 'prefix' => 'payment'], function () {
    route::get('/', [PaymentController::class, 'index']);
    route::get('/create', [PaymentController::class, 'create'])->name('create');
    route::post('/store', [PaymentController::class, 'store'])->name('store');
    route::get('/edit/{id}', [PaymentController::class, 'edit'])->name('edit');
    route::post('/update/{id}', [PaymentController::class, 'update'])->name('update');
    route::delete('destroy/{id}', [PaymentController::class, 'destroy'])->name('destroy');
});
route::get('/add', [PurchaseController::class, 'add'])->name('add');
Route::get('/view', [HomeController::class, 'view'])->name('view');


Route::get('/student-form', [StudentController::class, 'index']);
Route::post('/store-input-fields', [StudentController::class, 'store']);

Route::group(['as' => 'purchase_request.', 'prefix' => 'purchase_request'], function () {
    Route::get('/', [PurchaseRequestController::class, 'index']);
    Route::get('/create', [PurchaseRequestController::class, "create"])->name('create');
    Route::post('/store', [PurchaseRequestController::class, "store"])->name("store");
    Route::get('/view/{id}', [PurchaseRequestController::class, "view"])->name("view");
    Route::get('/additem/{id}', [PurchaseRequestController::class, "plus"])->name("plus");
    Route::post('/storeitem/{id}', [PurchaseRequestController::class, 'storeplus'])->name("storeplus");
    Route::get('/edit/{id}', [PurchaseRequestController::class, "edit"])->name("edit");
    Route::post('/update{id}', [PurchaseRequestController::class, "update"])->name("update");
    Route::delete('/destroy{id}', [PurchaseRequestController::class, "destroy"])->name("destroy");
    });
    Route::get('/Othergood', [HomeController::class, 'coba'])->name('coba');
    Route::get('/approval', [HomeController::class, 'Approval'])->name('Approval');