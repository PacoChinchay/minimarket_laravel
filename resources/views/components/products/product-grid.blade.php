<section class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6 px-4 sm:px-6 lg:px-8 py-8">
    @foreach ($products as $product)
        @include('components.products.product-grid-item', ['product' => $product])
    @endforeach
</section>
