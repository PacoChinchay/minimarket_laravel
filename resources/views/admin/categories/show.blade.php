@extends('layouts.admin')
@section('title', 'Detalle de categoría')
@section('content')
<div class="bg-white rounded-2xl shadow-md p-6 border border-[#e0e8d5]">
    <a href="{{ route('admin.categories.index') }}" 
       class="inline-flex items-center text-[#5c8b2d] hover:text-[#3a5e1e] mb-4">
       <i class="fas fa-arrow-left mr-2"></i> Volver
    </a>

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-[#3a5e1e]">{{ $category->name }}</h1>
        <p class="text-gray-700 mt-2">{{ $category->description }}</p>
    </div>

    <div class="bg-[#f6fbee] rounded-lg p-4 mb-6">
        <h2 class="text-xl font-semibold text-[#5c8b2d] mb-4">Productos asociados</h2>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-[#e0e8d5]">
                <thead class="bg-[#e0e8d5]">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Descripción</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Precio</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Stock</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-[#e0e8d5]">
                    @foreach ($category->products as $product)
                    <tr class="hover:bg-[#f6fbee] transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{route('admin.products.show', $product)}}" class="text-[#5c8b2d] hover:text-[#3a5e1e]">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 max-w-xs truncate">{{ $product->description }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">S/ {{ number_format($product->price, 2) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full 
                                  {{ $product->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $product->stock }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <form action="{{ route('admin.categories.products.detach', [$category->id, $product->id]) }}"
                                method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-500 hover:text-red-700"
                                        onclick="return confirm('¿Eliminar relación con este producto?')">
                                   <i class="fas fa-unlink"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection