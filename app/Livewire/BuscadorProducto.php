<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class BuscadorProducto extends Component
{

    public $search = '';
    public $mostrarResultados = false;

    public function updatedSearch()
    {
        $this->mostrarResultados = !empty($this->search);
    }

    public function render()
    {
        $productos = [];

         if (!empty(trim($this->search))) {
            $searchTerm = '%' . trim($this->search) . '%';
            
            $productos = Product::where(function($query) use ($searchTerm) {
                    $query->where('name', 'LIKE', $searchTerm)
                          ->orWhere('description', 'LIKE', $searchTerm);
                })
                // ->where('stock', '>', 0) // Solo productos con stock
                ->with('categories')
                ->orderBy('name')
                ->take(8)
                ->get();
        }

        return view('livewire.buscador-producto', [
            'productos' => $productos
        ]);
    }
}
