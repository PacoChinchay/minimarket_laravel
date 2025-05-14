@extends('layouts.admin')

@section('title', 'Usuarios')

@section('content')
    <div class="bg-white rounded-2xl shadow-md p-6 border border-[#e0e8d5]">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-[#3a5e1e]">Relación de Usuarios</h1>
            <a href="{{ route('admin.users.create') }}"
                class="bg-[#5c8b2d] hover:bg-[#3a5e1e] text-white px-4 py-2 rounded-lg transition-colors">
                <i class="fas fa-user-plus mr-2"></i> Nuevo Usuario
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-[#e0e8d5]">
                <thead class="bg-[#f6fbee]">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Nombre
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Email
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Tipo
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-[#e0e8d5]">
                    @foreach ($users as $user)
                        <tr class="hover:bg-[#f6fbee] transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div
                                        class="flex-shrink-0 h-10 w-10 rounded-full bg-[#e0e8d5] flex items-center justify-center text-[#5c8b2d]">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $roleClasses = [
                                        1 => 'bg-blue-100 text-blue-800', 
                                        2 => 'bg-red-100 text-red-800', 
                                        3 => 'bg-yellow-100 text-yellow-800',
                                    ];

                                    $roleNames = [
                                        1 => 'Cliente',
                                        2 => 'Administrador',
                                        3 => 'Empleado',
                                    ];
                                @endphp
                                <span
                                    class="px-2 py-1 text-xs font-semibold rounded-full {{ $roleClasses[$user->role_id] ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ $roleNames[$user->role_id] ?? 'Desconocido' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-3">
                                    <a href="{{ route('admin.users.edit', $user) }}"
                                        class="text-[#5c8b2d] hover:text-[#3a5e1e]">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700"
                                            onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
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
