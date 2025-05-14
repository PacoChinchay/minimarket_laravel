<div>
    <div class="mb-8 space-y-4 bg-white p-6 rounded-xl shadow-sm">
        <input type="text" wire:model.debounce.300ms="search" 
               placeholder="Buscar productos..." 
               class="w-full p-2 border rounded-lg">

        <select wire:model="selectedCategories" multiple 
                class="w-full border rounded-lg p-2">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <div class="space-y-2">
            <label>Rango de precios: hasta S/ {{ $priceRange }}</label>
            <input type="range" wire:model="priceRange" 
                   min="0" max="1000" step="50"
                   class="w-full">
        </div>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($products as $product)
            @include('components.products.product-grid', ['product' => $product])
        @endforeach
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>
</div>
