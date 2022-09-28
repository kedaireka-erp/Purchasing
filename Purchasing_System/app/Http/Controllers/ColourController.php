<?php

namespace App\Http\Controllers;

use App\Models\Colour;
use Illuminate\Http\Request;

class ColourController extends Controller
{
    public function index()
    {
        $colour = Colour::get();

        return \view('Coloue.index', ['colourlist' => $colour]);
    }

    public function create()
    {
        $colour = new Colour;

        return \view('Colour.create');
    }

    public function store(Request $request)
    {
        $colour = new Colour;
        $colour->name = $request->name;
        $colour->save();

        return \redirect('colour');
    }

    public function edit($id)
    {
        $colour = Colour::find($id);
        
        return \view('Colour.edit', ['colouredit' => $colour]);
    } 

    public function update(Request $request, $id)
    {
        $colour = Colour::find($id);
        $colour->name = $request->name;
        $colour->save();

        return \redirect('colour');
    }

    public function destroy($id)
    {
        $colour = Colour::find($id);
        $colour->delete();

        return \redirect('colour');
    }

}
