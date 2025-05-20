@extends('layouts.admin')

@section('title','Nuevo producto')

@section('content')
<div class="bg-white rounded-2xl shadow-md p-6 max-w-4xl mx-auto border border-[#e0e8d5]">
    <a href="{{ route('admin.products.index') }}" 
       class="inline-flex items-center text-[#5c8b2d] hover:text-[#3a5e1e] mb-4">
       <i class="fas fa-arrow-left mr-2"></i> Volver
    </a>

    <h1 class="text-2xl font-bold text-[#3a5e1e] mb-6">Crear nuevo producto</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <div>
            <label class="block text-gray-700 font-medium mb-2">Nombre</label>
            <input type="text" name="name" required
                   class="w-full border border-[#e0e8d5] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#5c8b2d]">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Categorías</label>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                @foreach ($categories as $category)
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                           class="rounded text-[#5c8b2d] focus:ring-[#5c8b2d]">
                    <span>{{ $category->name }}</span>
                </label>
                @endforeach
            </div>
            <a href="{{route('admin.categories.create')}}" class="text-sm text-[#5c8b2d] hover:underline mt-2 inline-block">
                + Agregar categoría
            </a>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Descripción</label>
            <textarea name="description" rows="4"
                      class="w-full border border-[#e0e8d5] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#5c8b2d]"></textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-gray-700 font-medium mb-2">Costo (S/)</label>
                <input type="number" name="buy" step="0.01" min="0" required
                       class="w-full border border-[#e0e8d5] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#5c8b2d]">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Precio (S/)</label>
                <input type="number" name="price" step="0.01" min="0" required
                       class="w-full border border-[#e0e8d5] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#5c8b2d]">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Stock</label>
                <input type="number" name="stock" required
                       class="w-full border border-[#e0e8d5] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#5c8b2d]">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Imagen (URL)</label>
                <input type="text" name="image"
                       class="w-full border border-[#e0e8d5] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#5c8b2d]">
            </div>
        </div>

        <button type="submit" 
                class="bg-[#5c8b2d] hover:bg-[#3a5e1e] text-white font-medium py-2 px-6 rounded-lg transition-colors">
            Crear Producto
        </button>
    </form>
</div>
@endsection