<?php

namespace App\Http\Controllers;

use App\Models\location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->filled('search')) {
            $locations = Location::search($request->search)->paginate(2);
        }else{
            $locations = Location::paginate(2);
        }
        
        return view('locations.index', compact('locations'));
    }

    public function create(){

        return view('locations.create');

    }
     public function store(Request $request){

        $validateData = $request->validate([
            'location_name'=>'required|unique:locations|max:100',
            'address'=>'required',
        ], [
            'location_name.required'=>"Location name field is required.",
            'address.required'=>"Address field is required ",
        ]);

        $locations = Location::create([
            'location_name'=>$request->location_name,
            'address'=>$request->address,
        ]);

        return redirect("/location");
     }

     public function edit($id){

        $locations = Location::findOrFail($id);

        return view('locations.edit', compact('locations'));
     }

     public function update(Request $request, $id){

        $locations=Location::findOrFail($id);
        $locations->update([
            'location_name'=>$request->location_name ?? $locations->location_name,
            'address'=>$request->address ?? $locations->address,
        ]);

        return redirect("/location");
     }

     public function destroy($id){

        $locations = Location::findOrFail($id);
        $locations->delete();

        return redirect("/location");
     }
}
