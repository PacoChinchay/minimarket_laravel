<?php

namespace App\Livewire;

use Livewire\Component;

class CartManager extends Component
{
    protected $listeners = ['cartUpdated' => '$refresh'];

    public function removeItem($productId)
    {
        $cart = session()->get('cart', []);
        unset($cart[$productId]);
        session()->put('cart', $cart);
        $this->emit('cartUpdated');
    }

    public function updateQuantity($productId, $quantity)
    {
        $cart = session()->get('cart');
        
        if($quantity > 0 && $quantity <= $cart[$productId]['stock']) {
            $cart[$productId]['quantity'] = $quantity;
            session()->put('cart', $cart);
            $this->emit('cartUpdated');
        }
    }

    public function render()
    {
        
       $cart = session()->get('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        
        return view('livewire.cart-manager', [
            'cart' => $cart,
            'total' => $total
        ]);
    }
}
