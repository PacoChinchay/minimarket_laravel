<x-app-layout>
    <x-header/>
    @include('components.home-slider.HomeSlider')

    <div class="px-4 py-8 bg-[#f6fbee]">
        <h2 class="text-2xl text-[#5c8b2d] font-bold mb-6">Categorías</h2>

        <div class="grid grid-cols-2 md:grid-cols-5 gap-6 mb-10">
            @foreach ($categories as $category)
                <a href="/store/categories/{{ $category->id }}"
                   class="bg-white rounded-xl border border-[#cddbb3] shadow hover:shadow-lg transition-transform hover:scale-105 p-4 flex flex-col items-center text-center text-[#5c8b2d] hover:text-[#3a5e1e]">
                    <div class="text-lg font-semibold">{{ $category->name }}</div>
                </a>
            @endforeach
        </div>
        <h2 class="text-2xl text-[#5c8b2d] font-bold mb-4">Productos destacados</h2>
        @include('components.products.product-grid', ['products' => $featuredProducts])
        
    </div>
</x-app-layout>
