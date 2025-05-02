<x-app-layout>
    <a href="/categories">Volver</a>
    <h1>{{ $category->name }}</h1>
    <p>{{ $category->description }}</p>

    <h2>Prodcutos asociados: </h2>
    <table>
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Descripción</td>
                <td>Precio</td>
                <td>Stock</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($category->products as $product)
                <tr>
                    <td><a href="/products/{{$product->id}}">{{ $product->name }}</a></td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <form action="{{ route('categories.products.detach', [$category->id, $product->id]) }}"
                            method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('¿Eliminar relación con este producto?')">🗑️ Quitar de categoría</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</x-app-layout>
