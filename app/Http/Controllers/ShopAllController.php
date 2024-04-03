<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ShopAllController extends Controller
{
    public function getAll()
    {
        $products = Product::all();
        return view('User/shop-all')->with('allProducts', $products);
                                //key-allProducts(dergohet ne view)-> perdoret si slot name/prop name
                                //value-$products(dergohet ne view)

    }
}
