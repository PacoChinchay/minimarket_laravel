<article class="bg-white rounded-2xl border border-[#84976d] shadow-md hover:shadow-xl transition-transform duration-300 transform hover:scale-105 max-w-sm w-full cursor-pointer">
  <div class="h-[250px] w-full overflow-hidden rounded-t-2xl ">
    <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->name }}" class="w-auto h-auto  object-cover transition-transform duration-300 hover:scale-110">
  </div>
  <div class="p-4 flex flex-col gap-2">
    <h3 class="text-xl font-semibold text-[#5c8b2d]">{{ $product->name }}</h3>
    <p class="text-sm text-[#6b7f4d]">{{ $product->description }}</p>
    <div class="flex justify-end mt-2">
      <span class="text-[#5c8b2d] font-bold text-lg">{{ number_format($product->price, 2) }} soles</span>
    </div>
  </div>
</article>