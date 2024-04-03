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
        return view('product-create');
    }

    /**Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8,2);
            $table->integer('quantity');
            $table->string('imgUrl');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
            $table */
   
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'description'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'imgUrl'=>'required',
            'category_id'=>'required',
        ]);
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
