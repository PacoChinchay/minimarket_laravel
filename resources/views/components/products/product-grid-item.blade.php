<a href="/store/products/{{ $product->id }}">
    <article
        class="bg-white rounded-xl md:rounded-2xl border border-[#84976d] shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden cursor-pointer group w-full h-full flex flex-col">
        <div class="relative aspect-square overflow-hidden">
            <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->name }}"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
        </div>

        <div class="p-4 md:p-6 flex flex-col flex-grow">
            <h5
                class="text-xs md:text-xl font-semibold text-[#3a5e1e] mb-2 transition-colors group-hover:text-[#2b4616]">
                {{ $product->name }}
            </h5>

            <div class="mt-auto flex justify-between items-center">
                <span class="font-bold text-base md:text-lg text-[#5c8b2d]">
                    {{ number_format($product->price, 2) }} soles
                </span>
                <form action="{{ route('cart.add', $product) }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" id="cantidadInputForm" name="quantity" value="1">
                    <button type="submit"
                        class="bg-[#5c8b2d] hover:bg-[#3a5e1e] text-white px-6 py-2 rounded-xl font-semibold transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.35 2.7a1 1 0 00.9 1.5H19m-6 0a2 2 0 11-4 0m10 0a2 2 0 11-4 0" />
                        </svg>
                    </button>
                </form>
            </div>
    </article>
</a>
