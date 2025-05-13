<div>
     @foreach($cart as $item)
        <div class="flex items-center justify-between border-b py-4"
             x-data="{ open: true }"
             x-show="open"
             x-transition>
            <!-- ... Contenido existente ... -->
            <button @click="open = false; $wire.removeItem({{ $item['id'] }})">
                <i class="fas fa-trash text-red-500"></i>
            </button>
        </div>
    @endforeach

    <div class="mt-6">
        Total: S/ {{ number_format($total, 2) }}
    </div>
</div>
