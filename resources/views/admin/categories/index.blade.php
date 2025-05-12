@extends('layouts.admin')
@section('title', 'Categorías')
@section('content')
<div class="bg-white rounded-2xl shadow-md p-6 border border-[#e0e8d5]">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-[#3a5e1e]">Categorías</h1>
        <a href="{{route('admin.categories.create')}}" 
           class="bg-[#5c8b2d] hover:bg-[#3a5e1e] text-white px-4 py-2 rounded-lg transition-colors">
           <i class="fas fa-plus mr-2"></i> Nueva Categoría
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-[#e0e8d5]">
            <thead class="bg-[#f6fbee]">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Productos</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-[#e0e8d5]">
                @foreach ($categories as $category)
                <tr class="hover:bg-[#f6fbee] transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{route('admin.categories.show', $category)}}" 
                           class="text-[#5c8b2d] hover:text-[#3a5e1e] font-medium">
                           {{ $category->name }}
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="bg-[#e0e8d5] text-[#5c8b2d] px-2 py-1 rounded-full text-xs">
                            {{ $category->products_count }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex space-x-3">
                            <a href="{{route('admin.categories.edit', $category)}}" 
                               class="text-[#5c8b2d] hover:text-[#3a5e1e]">
                               <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{route('admin.categories.destroy', $category)}}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-500 hover:text-red-700"
                                        onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">
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