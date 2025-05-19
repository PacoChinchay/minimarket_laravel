@extends('layouts.app')

@section('title', 'ORGANIC')

@section('content')

    @include('components.home-slider.HomeSlider')

    @livewire('popular-products')

    <div class="px-4 sm:px-6 lg:px-8 py-8 md:py-12 bg-[#f6fbee]">
        <section class="mb-12 md:mb-16">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-2xl md:text-3xl font-bold text-[#3a5e1e] mb-6 md:mb-8">Explora nuestras categorías</h2>

                <div class="overflow-x-auto pb-4 sm:hidden">
                    <div class="flex gap-4 w-max px-4">
                        @foreach ($categories as $category)
                            <a href="/store/categories/{{ $category->id }}"
                                class="group bg-white rounded-xl md:rounded-2xl border-2 border-[#cddbb3] hover:border-[#9bb072] shadow-sm hover:shadow-lg transition-all duration-300 ease-out p-4 md:p-5 flex flex-col items-center text-center h-full transform hover:-translate-y-1">
                                <div class="flex-1">
                                    <h3
                                        class="text-base md:text-lg font-semibold text-[#5c8b2d] group-hover:text-[#3a5e1e] transition-colors">
                                        {{ $category->name }}
                                    </h3>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="hidden sm:grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4 md:gap-6">
                    @foreach ($categories as $category)
                        <a href="/store/categories/{{ $category->id }}"
                            class="group bg-white rounded-xl md:rounded-2xl border-2 border-[#cddbb3] hover:border-[#9bb072] shadow-sm hover:shadow-lg transition-all duration-300 ease-out p-4 md:p-5 flex flex-col items-center text-center h-full transform hover:-translate-y-1">


                            <div class="flex-1">
                                <h3
                                    class="text-base md:text-lg font-semibold text-[#5c8b2d] group-hover:text-[#3a5e1e] transition-colors">
                                    {{ $category->name }}
                                </h3>

                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="max-w-7xl mx-auto">
            <h2 class="text-2xl md:text-3xl font-bold text-[#3a5e1e] mb-6 md:mb-8">Productos destacados</h2>
            @include('components.products.product-grid', ['products' => $featuredProducts])
        </section>
    </div>
@endsection