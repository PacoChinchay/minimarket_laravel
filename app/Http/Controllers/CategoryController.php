<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::withCount('products')->get();
        return view('categories.index', compact('categories'));
    }

    public function create() {
        return view('categories.create');
    }

    public function store(Request $request) {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();
        return redirect('/categories');
    }

    public function edit($category) {
        $category = Category::find($category);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request,$category) {
        $category = Category::find($category);

        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();
        return redirect('/categories');
    }

    public function destroy($category) {
        $category = Category::find($category);
        $category->delete();

        return redirect('/categories');
    }
}
