@extends('layouts.app')

@section('title', 'Nosotros')

@section('content')

    <div class="px-6 py-10 bg-[#f6fbee] min-h-screen">
        <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-lg overflow-hidden border border-[#cddbb3] p-6">
            <h1 class="text-2xl font-bold text-[#3a5e1e] mb-6">Tu Carrito de Compras</h1>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if(count($cart) > 0)
                <div class="space-y-4">
                    @foreach($cart as $item)
                    <div class="flex items-center justify-between border-b border-[#e0e8d5] pb-4">
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('products/' . $item['image']) }}" 
                                 alt="{{ $item['name'] }}" 
                                 class="w-20 h-20 object-cover rounded-lg">
                            <div>
                                <h3 class="font-semibold text-[#5c8b2d]">{{ $item['name'] }}</h3>
                                <p class="text-sm text-gray-600">Stock disponible: {{ $item['stock'] }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-6">
                            <div class="flex items-center gap-2">
                                <form action="{{ route('cart.update', $item['id']) }}" method="POST">
                                    @csrf
                                    <input type="number" 
                                           name="quantity" 
                                           value="{{ $item['quantity'] }}" 
                                           min="1" 
                                           max="{{ $item['stock'] }}" 
                                           class="w-20 border border-[#cddbb3] rounded px-2 py-1 text-center">
                                    <button type="submit" 
                                            class="text-[#5c8b2d] hover:text-[#3a5e1e] ml-2">
                                        <i class="fas fa-sync"></i>
                                    </button>
                                </form>
                            </div>
                            <p class="text-[#3a5e1e] font-semibold">
                                S/ {{ number_format($item['price'] * $item['quantity'], 2) }}
                            </p>
                            <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                @csrf
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-8 pt-4 border-t border-[#e0e8d5]">
                    <div class="flex justify-end">
                        <div class="text-xl font-bold text-[#3a5e1e]">
                            Total: S/ {{ number_format($total, 2) }}
                        </div>
                    </div>
                    
                    <div class="mt-6 flex justify-end gap-4">
                        <a href="{{ route('store.products.index') }}" 
                           class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded-xl">
                            Seguir comprando
                        </a>
                        <form action="{{ route('cart.checkout') }}" method="POST">
                            @csrf
                            <button type="submit" 
                                    class="bg-[#5c8b2d] hover:bg-[#3a5e1e] text-white px-6 py-2 rounded-xl">
                                Finalizar Compra
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-600 mb-4">Tu carrito está vacío</p>
                    <a href="{{ route('store.products.index') }}" 
                       class="bg-[#5c8b2d] hover:bg-[#3a5e1e] text-white px-6 py-2 rounded-xl">
                        Ver productos
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection