<x-app-layout>
  <h1>Bienvenido a la tienda</h1>

  <h2>Categorías</h2>
  <ul>
      @foreach ($categories as $category)
          <li><a href="/store/categories/{{ $category->id }}">{{ $category->name }}</a></li>
      @endforeach
  </ul>

  <h2>Productos destacados</h2>
  <ul>
      @foreach ($featuredProducts as $product)
          <li>
              <a href="/store/products/{{ $product->id }}">{{ $product->name }}</a>
              - {{ $product->price }} soles
          </li>
      @endforeach
  </ul>
</x-app-layout>
