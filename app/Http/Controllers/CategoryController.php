<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(5);
        $noCategories = Category::count();

        return view("admin/category/list", compact("categories", "noCategories"));
    }

    public function create()
    {
        return view("admin/category/create");
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($category) {
            activity()
                ->causedBy(auth()->user())
                ->performedOn($category)
                ->log(' has added a new category.');
            return redirect('/admin/category/list')->with('success', 'Category successfully stored.');
        }

        return redirect('/admin/category/list')->with('error', 'There was an error creating the category.');

    }


    public function show($id)
    {

    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('/admin/category/edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $category = Category::findOrFail($id);

        $category->update($requestData);

        if (!$category->save()) {
            return redirect()->route('category.edit', $id)->withErrors(['error' => 'There was an error updating the category!']);
        }

        return redirect('/admin/category/list')->with('success', 'Category successfully updated.');

    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if (!$category->delete()) {
            return redirect()->route('category.list')->withErrors(['error' => 'There was an error deleting the category!']);
        }

        return redirect('/admin/category/list')->with('success', 'Category successfully deleted.');
    }
}
