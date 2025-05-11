@extends('layouts.admin')

@section('title', 'Productos')

@section('content')
<div class="bg-white rounded-2xl shadow-md p-6 border border-[#e0e8d5]">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-[#3a5e1e]">Lista de Productos</h1>
        <a href="{{route('admin.products.create')}}" 
           class="bg-[#5c8b2d] hover:bg-[#3a5e1e] text-white px-4 py-2 rounded-lg transition-colors">
           + Nuevo Producto
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-[#e0e8d5]">
            <thead class="bg-[#f6fbee]">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Precio</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Stock</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-[#e0e8d5]">
                @foreach ($products as $product)
                <tr class="hover:bg-[#f6fbee] transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{route('admin.products.show', $product)}}" 
                           class="text-[#5c8b2d] hover:text-[#3a5e1e] font-medium">
                           {{ $product->name }}
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-600">S/ {{ number_format($product->price, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 text-sm rounded-full 
                              {{ $product->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $product->stock }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex space-x-2">
                            <a href="{{route('admin.products.edit', $product)}}" 
                               class="text-[#5c8b2d] hover:text-[#3a5e1e]">
                               <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{route('admin.products.destroy', $product)}}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-500 hover:text-red-700"
                                        onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                                   <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection