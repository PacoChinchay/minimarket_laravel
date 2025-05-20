@extends('layouts.admin')
@section('title', 'Crear usuario')

@section('content')
<div class="bg-white rounded-2xl shadow-md p-6 max-w-2xl mx-auto border border-[#e0e8d5]">
    <a href="{{ route('admin.users.index') }}" 
       class="inline-flex items-center text-[#5c8b2d] hover:text-[#3a5e1e] mb-4">
       <i class="fas fa-arrow-left mr-2"></i> Volver
    </a>

    <h1 class="text-2xl font-bold text-[#3a5e1e] mb-6">Crear Nuevo Usuario</h1>

    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
        @csrf
        
        <div>
            <label class="block text-gray-700 font-medium mb-2">Nombre</label>
            <input type="text" name="name" required
                   class="w-full border border-[#e0e8d5] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#5c8b2d]">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" name="email" required
                   class="w-full border border-[#e0e8d5] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#5c8b2d]">
        </div>

        @can('create', App\Models\User::class)
        <div>
            <label class="block text-gray-700 font-medium mb-2">Rol</label>
            <select name="role_id" 
                    class="w-full border border-[#e0e8d5] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#5c8b2d]">
                <option value="1">Cliente</option>
                <option value="2">Administrador</option>
                <option value="3">Vendedor</option>
                <option value="4">Repartidor</option>
            </select>
        </div>
        @else
        <input type="hidden" name="role_id" value="1">
        @endcan

        <div>
            <label class="block text-gray-700 font-medium mb-2">Contraseña</label>
            <input type="password" name="password" required
                   class="w-full border border-[#e0e8d5] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#5c8b2d]">
            <p class="text-xs text-gray-500 mt-1">Mínimo 8 caracteres</p>
        </div>

        <div class="flex justify-end pt-4">
            <button type="submit" 
                    class="bg-[#5c8b2d] hover:bg-[#3a5e1e] text-white font-medium py-2 px-6 rounded-lg transition-colors">
                <i class="fas fa-save mr-2"></i> Crear Usuario
            </button>
        </div>
    </form>
</div>
@endsection