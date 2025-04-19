<x-app-layout>
  <h1>Productos en la categoría: {{ $category->name }}</h1>

  <ul>
      @foreach ($products as $product)
          <li>
              <a href="/store/products/{{ $product->id }}">{{ $product->name }}</a>
              - {{ $product->price }} soles
          </li>
      @endforeach
  </ul>

  {{ $products->links() }}

  <a href="/">Volver a inicio</a>
</x-app-layout>
