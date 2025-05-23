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
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function show($product)
    {
        $product = Product::with('categories')->find($product);

        return view('admin.products.show', compact('product'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'buy' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|string',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $product = Product::create($validated);

        if ($request->has('categories')) {
            $product->categories()->attach($request->categories);
        }

        return redirect()->route('admin.products.index')
            ->with('success' . 'Producto creado correctamente');
    }

    public function edit($product)
    {
        $product = Product::with('categories')->findOrFail($product);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'buy' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|string',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $product = Product::findOrFail($product);
        $product->update($validated);

        if ($request->has('categories')) {
            $product->categories()->sync($request->categories);
        }

        return redirect()->route('admin.products.show', $product)
            ->with('success', 'Producto actualizado');
    }


    public function destroy($product)
    {
        $product = Product::findOrFail($product);
        $product->categories()->detach();
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Producto Eliminado');
    }

    public function buscar(Request $request)
    {
        $term = $request->input('q');

        $productos = Product::where('name', 'LIKE', "%{$term}%")
            ->orWhere('description', 'LIKE', "%{$term}%")
            ->take(8)
            ->get(['id', 'name', 'image', 'price']);

        return response()->json($productos);
    }
}
