@extends('layouts.admin')

@section('title', 'Detalle de producto')

@section('content')
<div class="bg-white rounded-2xl shadow-md overflow-hidden border border-[#e0e8d5] max-w-6xl mx-auto">
    <div class="p-6">
        <a href="{{ route('admin.products.index') }}" 
           class="inline-flex items-center text-[#5c8b2d] hover:text-[#3a5e1e] mb-4">
           <i class="fas fa-arrow-left mr-2"></i> Volver
        </a>

        <div class="flex flex-col md:flex-row gap-8">
            <div class="w-full md:w-1/3 bg-[#f6fbee] rounded-xl p-4 flex items-center justify-center">
                <img src="{{ $product->image ? '/products'.$product->image : 'https://via.placeholder.com/400' }}" 
                     alt="{{ $product->name }}" 
                     class="max-h-80 object-contain">
            </div>

            <div class="w-full md:w-2/3">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h1 class="text-3xl font-bold text-[#3a5e1e]">{{ $product->name }}</h1>
                        <p class="text-2xl font-semibold text-[#5c8b2d] my-2">S/ {{ number_format($product->price, 2) }}</p>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{route('admin.products.edit', $product)}}" 
                           class="text-white bg-[#5c8b2d] hover:bg-[#3a5e1e] px-3 py-1 rounded-lg">
                           <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{route('admin.products.destroy', $product)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="text-white bg-red-500 hover:bg-red-600 px-3 py-1 rounded-lg"
                                    onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                               <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </div>

                <div class="flex items-center gap-4 mb-6">
                    <div class="border border-[#e0e8d5] rounded-lg overflow-hidden">
                        <span class="bg-[#f6fbee] text-[#5c8b2d] font-medium py-2 px-4">Stock: {{ $product->stock }}</span>
                    </div>
                </div>

                <div class="mb-6">
                    <p class="text-gray-700 font-medium">Categorías: 
                        @foreach ($product->categories as $category)
                            <span class="bg-[#f6fbee] text-[#5c8b2d] px-2 py-1 rounded-full text-sm mr-1">
                                {{ $category->name }}
                            </span>
                        @endforeach
                    </p>
                </div>

                <div class="space-y-4">
                    <details class="bg-[#f6fbee] rounded-lg overflow-hidden">
                        <summary class="bg-[#e0e8d5] text-[#3a5e1e] font-medium p-4 cursor-pointer">Descripción</summary>
                        <div class="p-4 text-gray-700">{{ $product->description }}</div>
                    </details>

                    <details class="bg-[#f6fbee] rounded-lg overflow-hidden">
                        <summary class="bg-[#e0e8d5] text-[#3a5e1e] font-medium p-4 cursor-pointer">Zonas de delivery</summary>
                        <div class="p-4 text-gray-700">
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection