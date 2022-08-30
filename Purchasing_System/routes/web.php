<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SatuanController;

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

Route::group(['as'=>'satuan.','prefix'=>'satuan'], function() {
    Route::get('/', [SatuanController::class, 'index'])->name('satuandash');
    Route::get('/search', [SatuanController::class, 'search'])->name('satuansearch');
    Route::get('/add', [SatuanController::class, 'add'])->name('satuanadd');
    Route::post('/store', [SatuanController::class, 'store'])->name('satuanstore');
    Route::get('/edit/{id}', [SatuanController::class, 'edit'])->name('satuanedit');
    Route::post('/update/{id}', [SatuanController::class, 'update'])->name('satuanupdate');
    Route::delete('/delete/{id}', [SatuanController::class, 'destroy'])->name('satuandelete');

});

