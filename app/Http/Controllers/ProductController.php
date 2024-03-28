<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function getAll()
    {
        $products = Product::all();
        return view('shop-all')->with('allProducts', $products);
                                //key-allProducts(dergohet ne view)-> perdoret si slot name/prop name
                                //value-$products(dergohet ne view)
    }

    public function getByCategory(){

    }

    public function getByOccasion(){

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
