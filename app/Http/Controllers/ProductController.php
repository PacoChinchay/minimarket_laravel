<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function show($product)
    {
        $product = Product::with('categories')->find($product);

        return view('products.show', compact('product'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->image = $request->image;
        $product->save();

        if ($request->has('categories')) {
            $product->categories()->attach($request->categories);
        }

        return redirect('/products')->with('success', 'Producto creado correctamente');
    }

    public function edit($product)
    {
        $product = Product::find($product);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $product)
    {
        $product = Product::find($product);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->image = $request->image;
        $product->save();

        $category = Category::firstOrCreate(['name' => $request->category]);

        $product->categories()->sync([$category->id]);
        // $product->categories()->sync($request->categories);

        return redirect("/products/{$product->id}");
    }

    public function destroy($product)
    {
        $product = Product::find($product);
        $product->delete();
        return redirect("/products");
    }
}
