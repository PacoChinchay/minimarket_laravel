@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="bg-white rounded-xl shadow p-6">
    <h1 class="text-2xl font-bold text-[#3a5e1e] mb-4">Estadísticas</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-[#f6fbee] p-4 rounded-lg">
            <p class="text-gray-600">Usuarios registrados</p>
            <p class="text-2xl font-bold text-[#5c8b2d]">{{ $totalUsers }}</p>
        </div>
        
        <div class="bg-[#f6fbee] p-4 rounded-lg">
            <p class="text-gray-600">Productos activos</p>
            <p class="text-2xl font-bold text-[#5c8b2d]">{{ $totalProducts }}</p>
        </div>
        
        <div class="bg-[#f6fbee] p-4 rounded-lg">
            <p class="text-gray-600">Pedidos este mes</p>
            <p class="text-2xl font-bold text-[#5c8b2d]">{{ $monthlyOrders }}</p>
        </div>
    </div>
</div>
@endsection