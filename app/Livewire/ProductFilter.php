<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ProductFilter extends Component
{
    public $search = '';
    public $selectedCategories = [];
    public $priceRange = 500;

    public function render()
    {
        $products = Product::query()
            ->when($this->search, fn($q) => $q->where('name', 'like', "%{$this->search}%"))
            ->when($this->selectedCategories, fn($q) => $q->whereHas('categories', 
                fn($q) => $q->whereIn('id', $this->selectedCategories)
            ))
            ->where('price', '<=', $this->priceRange)
            ->with('categories')
            ->paginate(12);

        return view('livewire.product-filter', [
            'products' => $products,
            'categories' => Category::all()
        ]);
    }
}
