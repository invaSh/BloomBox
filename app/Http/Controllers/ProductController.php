<?php

namespace App\Http\Controllers;

use App\Models\Product_Occasion;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Occasion;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{

    public function getAll()
    {
        $products = Product::all();
        return view('shop-all')->with('allProducts', $products);

    }

    public function getByCategory()
    {

    }

    public function getByOccasion()
    {

    }

    public function index()
    {
        $products = Product::all();
        $noProducts = Product::count();
        return view('/admin/product/list', compact('products', 'noProducts'));
    }

    public function create()
    {
        $categories = Category::all();
        $occasions = Occasion::all();

        return view('/admin/product/create', compact('categories', 'occasions'));
    }


    public function store(Request $request)
    {
        $request->session()->put('productInput', $request->except(['_token', 'imgUrl']));

        $rules = [
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'imgUrl' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'category' => 'required|exists:categories,id',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $customMessage = 'Please fill all required fields and ensure the format is correct.';
            return redirect()->back()->withErrors($validator)->with('error', $customMessage)->withInput();
        }
        $fileName = '';

        if ($request->hasFile('imgUrl')) {
            $fileName = $request->file('imgUrl')->store('product-img', 'public');
        }

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->imgUrl = $fileName;
        $product->category_id = $request->input('category');
        $saved = $product->save();


        if ($saved) {
            activity()
                ->causedBy(auth()->user()) 
                ->performedOn($product) 
                ->log(' recently added a new product.'); 

            $occasions = $request->input('occasion');
            if ($occasions) {
                foreach ($occasions as $occasionId) {
                    $product->productOccasions()->attach($occasionId);
                }
            }
            $request->session()->forget('productInput');
            return redirect('/admin/product/list')->with('success', 'Product created successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to save the product.')->withInput();
        }
    }

    public function show($id)
    {
        $product = Product::with('productOccasions')->findOrFail($id);
        $category = Category::findOrFail($product->category_id);
        $selectedOccasionsIds = $product->productOccasions->pluck('id')->toArray();

        $selectedOccasions = [];

        foreach ($selectedOccasionsIds as $occasion) {
            $selectedOccasions[] = Occasion::findOrFail($occasion);
        }

        return view('/admin/product/details', compact('product', 'category', 'selectedOccasions'));
    }


    public function edit($id)
    {
        $product = Product::with('productOccasions')->findOrFail($id);
        $categories = Category::all();
        $occasions = Occasion::all();

        $selectedOccasions = $product->productOccasions->pluck('id')->toArray();

        return view('/admin/product/edit', compact('product', 'categories', 'occasions', 'selectedOccasions'));
    }


    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category' => 'required|exists:categories,id',
        ];

        $validator = Validator::make($request->except('imgUrl'), $rules);

        if ($validator->fails()) {
            $customMessage = 'Please fill all required fields and ensure the format is correct.';
            return redirect()->back()->withErrors($validator)->with('error', $customMessage)->withInput();
        }

        $product = Product::findOrFail($id);
        $oldQuantity = $product->quantity;

        if ($request->hasFile('imgUrl')) {
            $fileName = $request->file('imgUrl')->store('product-img', 'public');
            $product->imgUrl = $fileName;
        }
        $product->category_id = $request->input('category');

        $product->productOccasions()->sync($request->input('occasion', []));

        $product->update($request->except(['imgUrl', 'category', 'occasion_ids']));

        if ($product->save()) {
            if ($product->quantity != $oldQuantity) {
                activity()
                    ->causedBy(auth()->user())
                    ->performedOn($product)
                    ->log('recently restocked ' . $product->name);
            }
            return redirect('/admin/product/list')->with('success', 'Product updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update the product.')->withInput();
        }
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if (!$product->delete()) {
            return redirect('/admin/product/list')->withErrors(['error' => 'There was an error trying to delete this product. Try again!']);
        }

        return redirect('/admin/product/list')->with(['success' => 'Product has been deleted successfully!']);
    }
}
