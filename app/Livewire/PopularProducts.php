<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class PopularProducts extends Component
{

    public $products;

    public function mount()
    {
        $this->loadProducts();
    }

    public function loadProducts()
    {
        $this->products = Product::orderByDesc('views')
            ->limit(4)
            ->get();
    }

    public function render()
    {
        return view('livewire.popular-products');
    }
}
