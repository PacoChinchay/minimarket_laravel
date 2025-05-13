<div>
    <div class="flex items-center gap-2 mb-4">
        <button wire:click="decrement" 
                class="px-3 py-1 border rounded-lg"
                :disabled="quantity <= 1">-</button>
        
        <input type="number" 
               wire:model="quantity"
               min="1" 
               max="{{ $product->stock }}"
               class="w-20 text-center border rounded-lg">
        
        <button wire:click="increment" 
                class="px-3 py-1 border rounded-lg"
                :disabled="quantity >= {{ $product->stock }}">+</button>
    </div>

    <button wire:click="addToCart"
            class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition">
        Agregar al Carrito
    </button>
</div>
