<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class ShopAllController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('User/shop-all')->with('allProducts', $products);
    }

    
}
