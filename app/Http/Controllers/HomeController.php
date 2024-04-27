<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::inRandomOrder()->take(6)->get();

        return view('user/home/home')->with('products', $products);
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
        $product = Product::findOrFail($id);

        $category = Category::findOrFail($product->category_id);

        $relatedProducts = Product::inRandomOrder()->limit(3)->get();

        return view('/user/home/product', compact('product', 'category', 'relatedProducts'));
    }

    public function autocomplete(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'like', '%' . $query . '%')->get();

        $productData = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
            ];
        });

        return response()->json($productData);
    }
}
