<x-app-layout>
  <x-header />
  <div class="px-4 py-8 bg-[#f6fbee] min-h-screen">
    <h1 class="text-2xl font-bold text-[#5c8b2d] mb-6">Productos en la categoría: {{ $category->name }}</h1>

    @if ($products->count())
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($products as $product)
          <a href="/store/products/{{ $product->id }}"
             class="bg-white rounded-xl border border-[#000000] shadow hover:shadow-lg transition-transform hover:scale-105 p-4 flex flex-col items-center text-center text-[#5c8b2d] hover:text-[#3a5e1e]">
            
            <div class="h-[250px] w-full overflow-hidden rounded-t-2xl ">
              <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
            </div>
            
            <h3 class="text-xl font-semibold text-[#5c8b2d]">{{ $product->name }}</h3>
            <p class="text-sm text-[#6b7f4d]">{{ number_format($product->price, 2) }} soles</p>
          </a>
        @endforeach
        </div>
      <div class="mt-8">
        {{ $products->links() }}
      </div>
    @else
      <p class="text-[#84976d]">No hay productos disponibles en esta categoría.</p>
    @endif

    <div class="mt-6">
      <a href="/" class="text-[#5c8b2d] hover:underline font-medium">← Volver al inicio</a>
    </div>
  </div>
      </div>
      
  
  
</x-app-layout>
