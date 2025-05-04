<x-app-layout>
    <div class="px-4 py-8 bg-[#f6fbee] min-h-screen">
        <h1 class="text-2xl font-bold text-[#5c8b2d] mb-6">Todos los productos</h1>

        @if ($products->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <a href="/store/products/{{ $product->id }}"
                       class="bg-white rounded-xl border border-[#cddbb3] shadow hover:shadow-lg transition-transform hover:scale-105 p-4 flex flex-col items-center text-center text-[#5c8b2d] hover:text-[#3a5e1e]">
                        
                        <div class="w-full h-48 mb-4 overflow-hidden rounded-lg">
                            <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        </div>

                        <h3 class="text-lg font-semibold mb-1">{{ $product->name }}</h3>
                        <p class="text-sm text-[#84976d] mb-2">{{ number_format($product->price, 2) }} soles</p>

                        <div class="flex flex-wrap justify-center gap-1">
                            @foreach ($product->categories as $category)
                                <span class="bg-[#eaf0da] text-[#5c8b2d] text-xs px-2 py-1 rounded-full">{{ $category->name }}</span>
                            @endforeach
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $products->links() }}
            </div>
        @else
            <p class="text-[#84976d]">No hay productos disponibles.</p>
        @endif
        <div class="mt-6">
      <a href="/" class="text-[#5c8b2d] hover:underline font-medium">← Volver al inicio</a>
    </div>
    </div>
</x-app-layout>
