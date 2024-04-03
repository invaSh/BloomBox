<?php

namespace App\Http\Controllers;
use App\Models\Plant;

use Illuminate\Http\Request;

class PlantsController extends Controller
{
    
    public function getAll()
    {
        $plants = Plant::all();
        return view('User/plant')->with('allPlants', $plants);
                                //key-allPlants(dergohet ne view)-> perdoret si slot name/prop name
                                //value-$plants(dergohet ne view)
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
