<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where("user_id", Auth::user()->id)->first();
        $products = [];

        if ($cart) {
            $products = $cart->products()->withPivot('quantity')->get();
        } else {
            $products = collect();
        }

        $productTotal = 0;
        foreach ($products as $product) {
            $productTotal += $product->pivot->quantity * $product->price;
        }

        return view("/user/cart/cart", compact("products", "cart", "productTotal"));
    }
    public function store(Request $request)
    {
        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);
        $quantity = $request->input('quantity', 1);

        $product = $cart->products()->find($request->input('product_id'));

        if ($product) {
            $cart->products()->updateExistingPivot($request->input('product_id'), ['quantity' => $product->pivot->quantity + $quantity]);
        } else {
            $cart->products()->attach($request->input('product_id'), ['quantity' => $quantity]);
        }

        return back()->with('success', 'Product added to cart successfully!');
    }
    public function destroy($id)
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        if (!$cart) {
            return redirect()->back()->with('error', 'Cart not found.');
        }

        $detachedCount = $cart->products()->detach($id);

        if ($detachedCount == 0) {
            return redirect()->back()->with('error', 'Product not found in cart or error removing the product.');
        }

        return redirect()->back()->with('success', 'Product removed successfully!');
    }

}
