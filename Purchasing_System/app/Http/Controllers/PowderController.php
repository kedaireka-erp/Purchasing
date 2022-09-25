<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Powder;
use App\Models\Grade;
use App\Models\Supplier;

class PowderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->search;
        if ($request->filled('search')) {
            $powder = Powder::where('project', 'like', '%' .$keyword. '%')->paginate(5);
        } else {
            $powder = Powder::with('grade', 'supplier')->paginate(5);
        }
        
        return \view('Powder.index', \compact('powder'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $powder = new Powder;
        $grade = Grade::get();
        $supplier = Supplier::get();

        return \view('Powder.create', \compact('powder', 'grade', 'supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $powder = new Powder;
        $powder->id_grade = $request->id_grade;
        $powder->id_supplier = $request->id_supplier;
        $powder->warna =$request->warna;
        $powder->kode_warna =$request->kode_warna;
        $powder->finish =$request->finish;
        $powder->finishing =$request->finishing;
        $powder->quantity =$request->quantity;
        $powder->m2 =$request->m2;
        $powder->estimasi =$request->estimasi;
        $powder->fresh =$request->fresh;
        $powder->recycle =$request->recycle;
        $powder->alokasi =$request->alokasi;
        $powder->save();

        return \redirect('powder');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $powder = Powder::with('grade')->find($id);
        $grade = Grade::get();
        $supplier = Supplier::get();

        return \view('Powder.edit', \compact('powder','grade', 'supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $powder = Powder::find($id);
        $powder->id_grade = $request->id_grade;
        $powder->id_supplier = $request->id_supplier;
        $powder->warna =$request->warna;
        $powder->kode_warna =$request->kode_warna;
        $powder->finish =$request->finish;
        $powder->quantity =$request->quantity;
        $powder->m2 =$request->m2;
        $powder->estimasi =$request->estimasi;
        $powder->fresh =$request->fresh;
        $powder->recycle =$request->recycle;
        $powder->alokasi =$request->alokasi;
        $powder->save();

        return \redirect('powder');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $powder = Powder::find($id);
        $powder->delete();

        return \redirect('powder');
    }
}
