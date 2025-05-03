<article class="bg-white rounded-2xl border border-[#84976d] shadow-md overflow-hidden hover:shadow-lg transition duration-300">
  <div class="h-48 overflow-hidden">
      <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
  </div>
  <div class="p-4">
      <h3 class="text-lg font-semibold text-[#5c8b2d] mb-2">{{ $product->name }}</h3>
      <p class="text-sm text-[#84976d] mb-2">{{ $product->description }}</p>
      <span class="block text-[#5c8b2d] font-bold text-lg">{{ number_format($product->price, 2) }} soles</span>
  </div>
</article>
