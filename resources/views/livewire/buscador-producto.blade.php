<div class="relative w-full max-w-md" x-data="{ open: false }" x-on:click.away="open = false">
    <div class="flex items-center gap-2 bg-gray-100 rounded-full px-4 py-2">
        <i class="fas fa-search text-gray-400"></i>
        <input 
            type="text" 
            wire:model.debounce.300ms="search"
            x-on:focus="open = true"
            placeholder="Buscar productos..."
            class="flex-grow bg-transparent outline-none placeholder-gray-500 text-sm"
            {{-- wire:keyup.escape="resetSearch" --}}
        >
    </div>

    <div class="absolute w-full mt-2 z-50" x-show="open" x-transition>
        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-[#cddbb3]">
            @if($search && $productos->isEmpty())
                <div class="p-3 text-sm text-gray-500">
                    No se encontraron productos para "{{ $search }}"
                </div>
            @else
                @foreach ($productos as $producto)
                    <a href="{{ route('store.products.show', $producto) }}" 
                       class="flex items-center p-3 hover:bg-[#f6fbee] transition-colors border-b last:border-0">
                        <img src="{{ asset('products/' . ltrim($producto->image, '/')) }}" 
                             alt="{{ $producto->name }}" 
                             class="w-12 h-12 object-cover rounded-md mr-3">
                        <div>
                            <h3 class="text-sm font-semibold text-[#3a5e1e]">{{ $producto->name }}</h3>
                            <p class="text-xs text-[#5c8b2d]">
                                S/ {{ number_format($producto->price, 2) }}
                            </p>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
</div>