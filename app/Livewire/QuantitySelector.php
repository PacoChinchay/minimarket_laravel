<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class QuantitySelector extends Component
{
     public $product;
    public $quantity = 1;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function addToCart()
    {
        if($this->product->stock >= $this->quantity) {
            // Lógica para agregar al carrito
            $this->emit('cartUpdated');
            $this->dispatchBrowserEvent('notify', 
                ['message' => 'Producto agregado al carrito!', 'type' => 'success']);
        }
    }

    public function render()
    {
        return view('livewire.quantity-selector');
    }
}
