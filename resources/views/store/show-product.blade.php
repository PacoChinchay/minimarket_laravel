@extends('layouts.app')

@section('title', 'Producto')

@section('content')

  <div class="px-6 py-10 bg-[#f6fbee] min-h-screen">
    <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-lg overflow-hidden border border-[#cddbb3] md:flex">
      
      <div class="md:w-1/2 h-80 md:h-auto">
        <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
      </div>

      <div class="md:w-1/2 p-6 flex flex-col justify-between">
        <div>
          <h1 class="text-3xl font-bold text-[#5c8b2d] mb-4">{{ $product->name }}</h1>

          <p class="text-xl font-semibold text-[#3a5e1e] mb-2">
            <span class="text-sm text-[#84976d]">Precio unitario:</span> 
            <span id="precioUnitario">{{ number_format($product->price, 2) }}</span> soles
          </p>

          <p class="text-md text-[#84976d] mb-2">
            <span class="font-semibold text-[#5c8b2d]">Categoría:</span>
            {{ $product->category->name ?? 'Sin categoría' }}
          </p>

          <div class="mt-4 mb-4">
            <p class="font-semibold text-[#5c8b2d] mb-1">Descripción:</p>
            <p class="text-[#4f6541] text-sm leading-relaxed">
              {{ $product->description ?? 'No disponible' }}
            </p>
          </div>

          <div class="mt-4">
            <label for="cantidad" class="block font-semibold text-[#5c8b2d] mb-1">Cantidad (Stock: {{ $product->stock }}):</label>
            <input 
              type="number" 
              id="cantidad" 
              name="cantidad" 
              value="1" 
              min="1" 
              max="{{ $product->stock }}" 
              class="w-24 border border-[#cddbb3] rounded-md px-3 py-1 text-center text-[#5c8b2d] focus:outline-none focus:ring-2 focus:ring-[#5c8b2d]">
            <p id="stockAlert" class="text-sm text-red-600 mt-1 hidden">No hay suficiente stock disponible</p>
          </div>

          <div class="mt-3 mb-4">
            <p class="text-md font-bold text-[#3a5e1e]">
              Total: <span id="precioTotal">{{ number_format($product->price, 2) }}</span> soles
            </p>
          </div>

          <form action="{{route('cart.add', $product)}}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" id="cantidadInputForm" name="quantity" value="1">
            <button type="submit" class="bg-[#5c8b2d] hover:bg-[#3a5e1e] text-white px-6 py-2 rounded-xl font-semibold transition">
              Agregar al carrito 🛒
            </button>
          </form>
        </div>

        <div class="mt-6">
          <a href="{{route('store.products.index')}}"
             class="inline-block bg-[#5c8b2d] hover:bg-[#3a5e1e] text-white font-semibold py-2 px-4 rounded-xl transition">
            ← Volver a la lista de productos
          </a>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const precioUnitario = parseFloat(document.getElementById('precioUnitario').innerText.replace(',', ''));
      const cantidadInput = document.getElementById('cantidad');
      const cantidadForm = document.getElementById('cantidadInputForm');
      const precioTotal = document.getElementById('precioTotal');
      const stockMax = parseInt(cantidadInput.max);
      const stockAlert = document.getElementById('stockAlert');

      cantidadInput.addEventListener('input', () => {
        let cantidad = parseInt(cantidadInput.value);

        if (cantidad > stockMax) {
          stockAlert.classList.remove('hidden');
          cantidadInput.value = stockMax;
          cantidad = stockMax;
        } else {
          stockAlert.classList.add('hidden');
        }

        cantidadForm.value = cantidad;

        const total = (precioUnitario * cantidad).toFixed(2);
        precioTotal.innerText = total;
      });
    });
  </script>

@endsection