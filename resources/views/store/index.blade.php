<x-app-layout>
    <x-header/>
    @include('components.home-slider.HomeSlider')

    <div class="px-4 py-8 bg-[#f6fbee]">
        <h2 class="text-2xl text-[#5c8b2d] font-bold mb-4">Categorías</h2>
        <ul class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
            @foreach ($categories as $category)
                <li>
                    <a href="/store/categories/{{ $category->id }}" class="text-[#5c8b2d] hover:underline">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>

        <h2 class="text-2xl text-[#5c8b2d] font-bold mb-4">Productos destacados</h2>
        @include('components.products.product-grid', ['products' => $featuredProducts])
    </div>
</x-app-layout>
