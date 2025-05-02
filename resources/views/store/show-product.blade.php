<x-app-layout>
  <h1>{{ $product->name }}</h1>
  <p><strong>Precio:</strong> {{ $product->price }} soles</p>
  <p><strong>Categoría:</strong> {{ $product->category->name ?? 'Sin categoría' }}</p>
  <p><strong>Descripción:</strong> {{ $product->description ?? 'No disponible' }}</p>

  <a href="/store/products">Volver a la lista de productos</a>
</x-app-layout>
