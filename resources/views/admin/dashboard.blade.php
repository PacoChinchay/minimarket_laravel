@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <div class="bg-white rounded-xl shadow p-6">
        <h1 class="text-2xl font-bold text-[#3a5e1e] mb-4">Estadísticas Generales</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-[#f6fbee] p-4 rounded-lg">
                <p class="text-gray-600">Usuarios registrados</p>
                <p class="text-2xl font-bold text-[#5c8b2d]">{{ number_format($totalUsers) }}</p>
            </div>
            
            <div class="bg-[#f6fbee] p-4 rounded-lg">
                <p class="text-gray-600">Productos activos</p>
                <p class="text-2xl font-bold text-[#5c8b2d]">{{ number_format($activeProducts) }}</p>
            </div>
            
            <div class="bg-[#f6fbee] p-4 rounded-lg">
                <p class="text-gray-600">Pedidos este mes</p>
                <p class="text-2xl font-bold text-[#5c8b2d]">{{ number_format($monthlyOrders) }}</p>
            </div>
            
            <div class="bg-[#f6fbee] p-4 rounded-lg">
                <p class="text-gray-600">Ingresos mensuales</p>
                <p class="text-2xl font-bold text-[#5c8b2d]">S/ {{ number_format($revenue, 2) }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-xl font-bold text-[#3a5e1e] mb-4">Últimos Pedidos</h2>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-[#f6fbee]">
                    <tr>
                        <th class="px-4 py-2 text-left text-[#5c8b2d]">ID</th>
                        <th class="px-4 py-2 text-left text-[#5c8b2d]">Usuario</th>
                        <th class="px-4 py-2 text-left text-[#5c8b2d]">Total</th>
                        <th class="px-4 py-2 text-left text-[#5c8b2d]">Fecha</th>
                        <th class="px-4 py-2 text-left text-[#5c8b2d]">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($latestOrders as $order)
                    <tr class="border-b hover:bg-[#f6fbee]">
                        <td class="px-4 py-2">#{{ $order->id }}</td>
                        <td class="px-4 py-2">{{ $order->user->name }}</td>
                        <td class="px-4 py-2">S/ {{ number_format($order->total, 2) }}</td>
                        <td class="px-4 py-2">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 rounded-full text-sm 
                                @if($order->state == 'completado') bg-green-100 text-green-800
                                @elseif($order->state == 'pendiente') bg-yellow-100 text-yellow-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ ucfirst($order->state) }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection