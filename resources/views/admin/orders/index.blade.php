@extends('layouts.admin')
@section('title', 'Órdenes')
@section('content')
<div class="bg-white rounded-2xl shadow-md p-6 border border-[#e0e8d5]">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-[#3a5e1e]">Gestión de Pedidos</h1>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-[#e0e8d5]">
            <thead class="bg-[#f6fbee]">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider"># Orden</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Cliente</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Fecha</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Total</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Estado</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-[#e0e8d5]">
                @foreach ($orders as $order)
                <tr class="hover:bg-[#f6fbee] transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-[#5c8b2d] font-medium">#{{ $order->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $order->user->name }}</div>
                        <div class="text-sm text-gray-500">{{ $order->user->email }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        {{ $order->date->format('d/m/Y H:i') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        S/ {{ number_format($order->total, 2) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @php
                            $statusColors = [
                                'pendiente' => 'bg-yellow-100 text-yellow-800',
                                'confirmado' => 'bg-blue-100 text-blue-800',
                                'enviado' => 'bg-indigo-100 text-indigo-800',
                                'entregado' => 'bg-green-100 text-green-800',
                                'cancelado' => 'bg-red-100 text-red-800'
                            ];
                        @endphp
                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $statusColors[$order->state] }}">
                            {{ ucfirst($order->state) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('admin.orders.show', $order) }}" 
                           class="text-[#5c8b2d] hover:text-[#3a5e1e] mr-2">
                           <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $orders->links() }}
    </div>
</div>
@endsection