<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create() {
        return view('products.index');

    }

    public function show($product) {
        $product = Product::with('categories')->find($product);

        return view('products.show', compact('product'));
    }
}
