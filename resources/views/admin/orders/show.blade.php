@extends('layouts.admin')
@section('title', 'Detalle de Orden')
@section('content')
<div class="bg-white rounded-2xl shadow-md p-6 border border-[#e0e8d5]">
    <div class="flex justify-between items-start mb-6">
        <div>
            <a href="{{ route('admin.orders.index') }}" 
               class="inline-flex items-center text-[#5c8b2d] hover:text-[#3a5e1e] mb-4">
               <i class="fas fa-arrow-left mr-2"></i> Volver
            </a>
            <h1 class="text-2xl font-bold text-[#3a5e1e]">Orden #{{ $order->id }}</h1>
            <p class="text-sm text-gray-500 mt-1">{{ $order->date->format('d/m/Y H:i') }}</p>
        </div>
        
        <form action="{{ route('admin.orders.update-status', $order) }}" method="POST" class="flex items-center gap-2">
            @csrf
            <select name="status" 
                    class="border border-[#e0e8d5] rounded-lg px-3 py-1 focus:outline-none focus:ring-2 focus:ring-[#5c8b2d] text-sm">
                @foreach(['pendiente', 'confirmado', 'enviado', 'entregado', 'cancelado'] as $status)
                    <option value="{{ $status }}" {{ $order->state === $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
            <button type="submit" 
                    class="bg-[#5c8b2d] hover:bg-[#3a5e1e] text-white px-3 py-1 rounded-lg text-sm">
                Actualizar
            </button>
        </form>
    </div>

    <div class="grid md:grid-cols-2 gap-8 mb-8">
        <div>
            <h2 class="text-lg font-semibold text-[#3a5e1e] mb-3">Datos del Cliente</h2>
            <div class="bg-[#f6fbee] rounded-lg p-4">
                <p class="text-sm"><span class="font-medium">Nombre:</span> {{ $order->user->name }}</p>
                <p class="text-sm"><span class="font-medium">Email:</span> {{ $order->user->email }}</p>
            </div>
        </div>

        <div>
            <h2 class="text-lg font-semibold text-[#3a5e1e] mb-3">Detalles del Pedido</h2>
            <div class="bg-[#f6fbee] rounded-lg p-4">
                <p class="text-sm"><span class="font-medium">Total:</span> S/ {{ number_format($order->total, 2) }}</p>
                <p class="text-sm"><span class="font-medium">Estado actual:</span> 
                    <span class="px-2 py-1 text-xs rounded-full {{ $statusColors[$order->state] ?? 'bg-gray-100' }}">
                        {{ ucfirst($order->state) }}
                    </span>
                </p>
            </div>
        </div>
    </div>

    <h2 class="text-lg font-semibold text-[#3a5e1e] mb-4">Productos</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-[#e0e8d5]">
            <thead class="bg-[#f6fbee]">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Producto</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Precio Unitario</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Cantidad</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#5c8b2d] uppercase tracking-wider">Subtotal</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-[#e0e8d5]">
                @foreach ($order->products as $product)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-[#5c8b2d]">{{ $product->name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        S/ {{ number_format($product->pivot->price, 2) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        {{ $product->pivot->amount }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        S/ {{ number_format($product->pivot->price * $product->pivot->amount, 2) }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection