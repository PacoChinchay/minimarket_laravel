<x-app-layout>
    <h1>Todos los productos</h1>

    <ul>
        @foreach ($products as $product)
            <li>
                <a href="/store/products/{{ $product->id }}">{{ $product->name }}</a>
                - {{ $product->price }} soles
                @foreach ($product->categories as $category)
                    <span>{{ $category->name }}</span>
                @endforeach

            </li>
        @endforeach
    </ul>

    {{ $products->links() }}
</x-app-layout>
