@extends('layouts.app')

@section('title', 'Nosotros')

@section('content')

    <div class="bg-[#f6fbee] min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-8">
            <!-- Header con botón de volver -->
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 gap-4">
                <a href={{route('store.index')}} class="order-2 md:order-1 w-fit inline-flex items-center text-[#5c8b2d] hover:text-[#3a5e1e] transition-colors group">
                    <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span class="font-medium">Volver al inicio</span>
                </a>
                <h1 class="order-1 md:order-2 text-3xl md:text-4xl font-bold text-[#3a5e1e] text-center md:text-right">Todos los productos</h1>
            </div>

            @if ($products->count())
                <!-- Grid de productos -->
                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
                    @foreach ($products as $product)
                        <a href="/store/products/{{ $product->id }}" 
                           class="bg-white group relative rounded-xl md:rounded-2xl border border-[#cddbb3] hover:border-[#9bb072] shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden">
                            
                            <!-- Imagen del producto -->
                            <div class="aspect-square w-full bg-gray-100 overflow-hidden">
                                <img src="{{ asset('products/' . $product->image) }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            </div>

                            <!-- Contenido -->
                            <div class="p-4 md:p-5">
                                <h3 class="text-base md:text-lg font-semibold text-[#5c8b2d] mb-1 line-clamp-2">
                                    {{ $product->name }}
                                </h3>
                                <p class="text-sm md:text-base font-bold text-[#3a5e1e] mb-3">
                                    S/ {{ number_format($product->price, 2) }}
                                </p>
                                
                                <!-- Categorías -->
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($product->categories as $category)
                                        <span class="bg-[#eaf0da] text-[#5c8b2d] text-xs md:text-sm px-2.5 py-1 rounded-full">
                                            {{ $category->name }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Paginación -->
                <div class="mt-8 md:mt-12 px-4">
                    {{ $products->links() }}
                </div>
            @else
                <!-- Estado vacío -->
                <div class="text-center py-12 md:py-16">
                    <div class="max-w-md mx-auto">
                        <svg class="mx-auto h-12 w-12 text-[#cddbb3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-[#3a5e1e]">No hay productos disponibles</h3>
                        <p class="mt-1 text-sm text-[#84976d]">Prueba con otra categoría o filtro de búsqueda</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
    
@endsection