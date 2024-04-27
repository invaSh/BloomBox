<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Occasion;
use Illuminate\Http\Request;

class ShopAllController extends Controller
{
    public function index(Request $request)
    {
        $orderBy = $request->input('orderBy', 'newest');

        $products = Product::query();

        switch ($orderBy) {
            case 'highest_price':
                $products->orderBy('price', 'desc');
                break;
            case 'lowest_price':
                $products->orderBy('price', 'asc');
                break;
            case 'best_selling':
                $products->select('products.*')
                    ->join('order__products', 'products.id', '=', 'order__products.product_id')
                    ->groupBy('products.id')
                    ->orderByRaw('COUNT(order__products.product_id) DESC');
                break;
            default:
                $products->orderBy('created_at', 'desc');
                break;
        }

        $products = $products->get();

        return view('User/shop-all')->with('allProducts', $products);
    }

    public function flowers($id){
        $products = Product::where('category_id', $id)->get();
        $category = Category::find($id)->first();
        return view('/user/flowers', compact('products', 'category'));
    }

    public function occasions($id){
        $occasion = Occasion::findOrFail( $id );

        $products = $occasion->products()->get();

        return view('/user/occasion', compact('products','occasion'));
    }
}
