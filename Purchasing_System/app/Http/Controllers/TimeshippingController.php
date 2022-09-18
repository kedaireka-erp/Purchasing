<?php

namespace App\Http\Controllers;

use App\Models\Timeshipping;
use Illuminate\Http\Request;

class TimeshippingController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->search;
        $timeshipping = Timeshipping::where('name', 'like', '%' .$keyword. '%')
        ->paginate(5);
        return \view('Timeshipping.index', \compact('timeshipping'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $timeshipping = new Timeshipping;
        return \view('Timeshipping.create', \compact('timeshipping'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $timeshipping = new Timeshipping;
        $timeshipping->name = $request->name;
        $timeshipping->save();

        return \redirect('timeshipping');
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
        $timeshipping = Timeshipping::find($id);
        return \view('Timeshipping.edit', \compact('timeshipping'));
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
        $timeshipping = Timeshipping::find($id);
        $timeshipping->name = $request->name;
        $timeshipping->save();

        return \redirect('timeshipping');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timeshipping = Timeshipping::find($id);
        $timeshipping->delete();

        return \redirect('timeshipping');
    }
}
