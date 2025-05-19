<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index() {
        $featuredProducts = Product::latest()->take(10)->get();
        $categories = Category::all();

        return view('store.index', compact('featuredProducts', 'categories'));
    }

    public function products() {
        $products = Product::with('categories')->paginate(12);
        return view('store.products', compact('products'));
    }

    public function showProduct(Product $product) {
        $product->increment('views');

        return view('store.show-product', compact('product'));
    }

    public function category(Category $category) {
        $products = $category->products()->paginate(12);
        return view('store.category', compact('category', 'products'));
    }

    public function aboutUs() {
        return view('store.about-us');
    }

    public function cart() {
        return view('store.cart');
    }
}
