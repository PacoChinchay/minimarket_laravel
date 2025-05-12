<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();
        return redirect()->route('admin.categories.index');
    }

    public function edit($category)
    {
        $category = Category::find($category);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $category)
    {
        $category = Category::find($category);

        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();
        return redirect()->route('admin.categories.index');
    }

    public function destroy($category)
    {
        $category = Category::find($category);
        $category->delete();

        return redirect()->route('admin.categories.index');
    }

    public function show($category)
    {
        $category = Category::find($category);
        return view('admin.categories.show', compact('category'));
    }

    public function detachProduct($categoryId, $productId)
    {
        $category = Category::findOrFail($categoryId);
        $category->products()->detach($productId);

        return redirect()->back()->with('success', 'Relación eliminada correctamente.');
    }
}
