<section class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6 w-full">
    @foreach ($products as $product)
        @include('components.products.product-grid-item', ['product' => $product])
    @endforeach
</section>
