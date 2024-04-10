<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Occasion;

class OccasionController extends Controller
{
    public function index()
    {
        $occasions = Occasion::all();
        $noOccasions = Occasion::count();

        return view("admin/occasion/list", compact("occasions", "noOccasions"));
    }

    public function create()
    {
        return view("/admin/occasion/create");
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            "name"=> "required",
            "description"=> "required",
        ]);


        $occasions = Occasion::create($requestData);

        if($occasions == null){
            return redirect()->back()->with("error","There was an error creating the category!");
        }

        return redirect('/admin/occasion/list')->with("success","Occasion added successfully");
    }

    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $occasion = Occasion::findOrFail($id);

        return view("/admin/Occasion/edit", compact("occasion"));
    }

   
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            "name"=> "required",
            "description"=> "required",
        ]);

        $occasion = Occasion::findOrFail($id);

        $occasion->update($requestData);

        if( !$occasion->save() ){
            return redirect()->back()->with("error","There was a problem uppdating the occasion. Try again!");
        }
        return redirect("/admin/occasion/list")->with("success","Category updated successfully!");
    }

    public function destroy($id)
    {
        $occasion = Occasion::findOrFail($id);

        if(!$occasion->delete()){
            return redirect()->route('occasion.edit', $occasion->id)->withErrors(['error' => 'There was an error deleting the occasion!']);
        }

        return redirect("/admin/occasion/list")->with("success","Occasion successfully deleted!");

    }
}
