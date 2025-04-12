<x-app-layout>
  <h1>Lista de productos</h1>
  <a href="/products/create">Nuevo Producto</a>
<ul>
  @foreach ($products as $product)
    <li>
      <a href="/products/{{$product->id}}">
        {{$product->name}}
      </a>
    </li>  
  @endforeach
</ul>
</x-app-layout>