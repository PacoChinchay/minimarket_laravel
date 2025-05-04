<article class="bg-white rounded-2xl border border-[#84976d] shadow-md overflow-hidden hover:shadow-lg transition duration-300 flex flex-col items-center relative cursor-pointer hover:scale-105">
  <div class="h-[300px] w-[300px] overflow-hidden">
      <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
  </div>
  <div class="p-4">
      <h3 class="text-lg font-semibold text-[#5c8b2d] mb-2">{{ $product->name }}</h3>
      <p class="text-sm text-[#84976d] mb-2">{{ $product->description }}</p>
      <span class="block text-[#5c8b2d] font-bold text-lg absolute bottom-0 right-2">{{ number_format($product->price, 2) }} soles</span>
  </div>
</article>
