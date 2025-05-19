<div class="my-8 px-4 sm:px-6 lg:px-8" wire:poll.5s> <!-- Actualiza cada 5 segundos -->
    <h2 class="text-2xl font-bold text-[#3a5e1e] mb-6">Productos Destacados</h2>
    
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach($products as $product)
            <div class="bg-white rounded-xl border border-[#84976d] p-4 transition-all hover:shadow-lg">
                <a href="/store/products/{{ $product->id }}" class="block">
                    <img 
                        src="{{ asset('products/' . $product->image) }}" 
                        alt="{{ $product->name }}" 
                        class="w-full h-40 object-cover rounded-lg mb-3"
                    >
                    <h3 class="font-semibold text-[#3a5e1e]">{{ $product->name }}</h3>
                    <p class="text-[#5c8b2d] font-bold">{{ number_format($product->price, 2) }} soles</p>
                </a>
            </div>
        @endforeach
    </div>
</div>