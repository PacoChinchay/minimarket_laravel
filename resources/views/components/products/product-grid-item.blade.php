<article class="bg-white rounded-xl md:rounded-2xl border border-[#84976d] shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden cursor-pointer group w-full h-full flex flex-col">
  <div class="relative aspect-square overflow-hidden">
    <img 
      src="{{ asset('products/' . $product->image) }}" 
      alt="{{ $product->name }}" 
      class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
    >
  </div>
  
  <div class="p-4 md:p-6 flex flex-col flex-grow">
    <h5 class="text-xs md:text-xl font-semibold text-[#3a5e1e] mb-2 transition-colors group-hover:text-[#2b4616]">
      {{ $product->name }}
    </h5>
    
    <p class="text-gray-600 text-base mb-4 line-clamp-3 hidden md:block">
      {{ $product->description }}
    </p>
    
    <div class="mt-auto flex justify-between items-center">
      <span class="font-bold text-base md:text-lg text-[#5c8b2d]">
        {{ number_format($product->price, 2) }} soles
      </span>
      <!-- Aquí puedes agregar un botón de carrito si necesitas -->
    </div>
  </div>
</article>