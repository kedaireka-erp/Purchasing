<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ships;
use App\Http\Requests\ships_request;


class ships_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->search;
        //$datas = ships::all();
        $datas = ships::where('type', 'LIKE', '%' .$keyword. '%')
        ->paginate(5);
        return \view('ships.index', \compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new ships;
        return \view('ships.create', \compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ships_request $request)
    {
        $model = new ships;
        $model->type = $request->type;
        $model->save();

        return \redirect('ships')->with('success', 'Data kebutuhan berhasil ditambahkan');
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
        $model = ships::find($id);
        return \view('ships.edit', \compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ships_request $request, $id)
    {
        $model = ships::find($id);
        $model->type = $request->type;
        $model->save();

        return \redirect('ships')->with('teredit', 'Data kebutuhan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = ships::find($id);
        $model->delete();
        return
        \redirect('ships')->with('terhapus','Berhasil menghapus data kebutuhan');
    }
}