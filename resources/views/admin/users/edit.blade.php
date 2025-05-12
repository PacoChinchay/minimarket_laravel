@extends('layouts.admin')
@section('title', 'Editar usuario')

@section('content')
    <div class="bg-white rounded-2xl shadow-md p-6 max-w-2xl mx-auto border border-[#e0e8d5]">
        <a href="{{ route('admin.users.index') }}" class="inline-flex items-center text-[#5c8b2d] hover:text-[#3a5e1e] mb-4">
            <i class="fas fa-arrow-left mr-2"></i> Volver
        </a>

        <h1 class="text-2xl font-bold text-[#3a5e1e] mb-6">Editar Usuario</h1>

        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700 font-medium mb-2">Nombre</label>
                <input type="text" name="name" value="{{ $user->name }}" required
                    class="w-full border border-[#e0e8d5] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#5c8b2d]">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" required
                    class="w-full border border-[#e0e8d5] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#5c8b2d]">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Tipo</label>
                <select name="role_id"
                    class="w-full border border-[#e0e8d5] rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#5c8b2d]">
                    <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Cliente</option>
                    <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>Administrador</option>
                    <option value="3" {{ $user->role_id == 3 ? 'selected' : '' }}>Empleado</option>
                </select>
            </div>

            <div class="flex justify-end pt-4 space-x-3">
                <a href="{{ route('admin.users.index') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-6 rounded-lg transition-colors">
                    Cancelar
                </a>
                <button type="submit"
                    class="bg-[#5c8b2d] hover:bg-[#3a5e1e] text-white font-medium py-2 px-6 rounded-lg transition-colors">
                    <i class="fas fa-save mr-2"></i> Guardar Cambios
                </button>
            </div>
        </form>
    </div>
@endsection
