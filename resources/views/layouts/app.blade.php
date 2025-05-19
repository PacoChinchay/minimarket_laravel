<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MiniMarket') }} | @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @livewireStyles
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @stack('styles')
</head>

<body class="bg-[#f6fbee]">
    <div class="flex w-full bg-white">
        <header class="flex justify-between items-center w-full max-w-7xl h-[70px] md:h-[80px] mx-auto px-3 sm:px-4">
            <div class="flex items-center md:flex-grow-0 flex-grow">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('header/logo.png') }}" alt="Logo" class="h-12 md:h-16 object-contain">
                </a>
            </div>

            <div class="hidden md:flex items-center gap-2 bg-gray-100 rounded-full px-2 py-2 w-full max-w-md mx-4 relative"
                x-data="search()" @keydown.escape="isOpen = false" @click.away="isOpen = false">

                <input type="text" id="buscador-input" x-ref="searchInput" placeholder="Buscar productos..."
                    class="flex-grow bg-transparent outline-none placeholder-gray-500 text-sm ml-2"
                    x-model.debounce.300ms="searchTerm" @focus="isOpen = true">


                <!-- Loading spinner mejor posicionado -->
                <div x-show="isLoading" class="pr-2">
                    <svg class="animate-spin h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                    </svg>

                </div>

                <!-- Resultados con mejor manejo de estados -->
                <div id="resultados-busqueda"
                    class="absolute top-full w-full mt-2 bg-white rounded-lg shadow-xl z-50"
                    x-show="isOpen" x-transition.opacity x-cloak>
                    <template x-if="resultados.length > 0">
                        <div class="max-h-96 overflow-y-auto">
                            <!-- Cada resultado con transición -->
                            <template x-for="producto in resultados" :key="producto.id">
                                <a :href="`/store/products/${producto.id}`"
                                    class="flex items-center p-3 hover:bg-gray-50 transition-colors border-b last:border-0"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                                    <!-- Imagen con fallback -->
                                    <div class="w-12 h-12 rounded-md mr-3 bg-gray-100 flex items-center justify-center">
                                        <template x-if="producto.image">
                                            <img :src="`{{ asset('products/') }}/${producto.image}`"
                                                :alt="producto.name" class="object-cover w-full h-full">
                                        </template>
                                        <template x-if="!producto.image">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </template>
                                    </div>

                                    <!-- Contenido del resultado -->
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-sm font-semibold text-gray-800 truncate" x-text="producto.name">
                                        </h3>
                                        <p class="text-xs text-green-600" x-text="`S/ ${producto.price}`"></p>
                                    </div>
                                </a>
                            </template>
                        </div>
                    </template>

                    <!-- Mensaje de resultados vacíos -->
                    <div x-show="resultados.length === 0 && searchTerm.length > 2 && !isLoading"
                        class="p-4 text-center text-gray-500" x-cloak>
                        No se encontraron resultados para "<span x-text="searchTerm"></span>"
                    </div>
                </div>
            </div>



            <div class="flex items-center gap-4 md:gap-6 ml-2 md:ml-6">
                <div class="relative p-2 hover:bg-gray-100 rounded-full transition-colors">
                    <a href="{{ route('store.cart') }}" class="block relative">
                        <img src="{{ asset('header/cart.svg') }}" alt="Carrito" class="w-8 h-8">
                        @if (count(session('cart', [])) > 0)
                            <span
                                class="absolute -top-2 -right-2 bg-[#5C8B2D] text-white text-xs font-bold rounded-full px-2 py-0.5">
                                {{ array_sum(array_column(session('cart'), 'quantity')) }}
                            </span>
                        @endif
                    </a>
                </div>

                @guest
                    <div class="p-2 hover:bg-gray-100 rounded-full transition-colors">
                        <a href="/login">
                            <img src="{{ asset('header/user.svg') }}" alt="Usuario" class="w-8 h-8 md:w-6 md:h-6">
                        </a>
                    </div>
                @endguest

                @auth
                    <div class="flex items-center gap-2">
                        <div class="hidden md:block text-sm text-gray-600">
                            Hola, {{ Auth::user()->name }}
                        </div>
                        <form action="{{ route('auth.logout') }}" method="POST" class="m-0">
                            @csrf
                            <button class="bg-red-500 text-white text-sm px-3 py-2 rounded-lg md:rounded-full">
                                Salir
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
        </header>
    </div>


    <footer class="w-full bg-[#f6edd9] py-4 shadow-md">
        <div class="max-w-5xl mx-auto px-4">
            <nav class="flex justify-around gap-3 md:gap-0 text-[#5C8B2D] font-semibold text-xs md:text-base">
                <a href="/" class="py-1 hover:underline">Inicio</a>
                <a href="{{ route('store.products.index') }}" class="py-1 hover:underline">Productos</a>
                <a href={{ route('about-us') }} class="py-1 hover:underline">Nosotros</a>
            </nav>
        </div>
    </footer>


    <main class="min-h-screen">
        @yield('content')
    </main>

    @livewireScripts
    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('search', () => ({
                    searchTerm: '',
                    resultados: [],
                    isLoading: false,
                    isOpen: false,

                    init() {
                        this.$watch('searchTerm', (value) => {
                            if (value.length > 1) {
                                this.isOpen = true;
                                this.buscarProductos(value);
                            }
                        });
                    },

                    async buscarProductos(term) {
                        this.isLoading = true;
                        try {
                            const response = await fetch(
                                `{{ route('productos.buscar') }}?q=${encodeURIComponent(term)}`);
                            if (!response.ok) throw new Error('Error en la respuesta');
                            const data = await response.json();

                            this.resultados = data.map(p => ({
                                ...p,
                                price: parseFloat(p.price).toFixed(2)
                            }));

                        } catch (error) {
                            console.error('Error:', error);
                            this.resultados = [];
                        } finally {
                            this.isLoading = false;
                        }
                    }
                }));
            });
        </script>
    @endpush
    @push('styles')
        <style>
            [x-cloak] {
                display: none !important;
            }

            #resultados-busqueda {
                scroll-behavior: smooth;
            }

            #resultados-busqueda::-webkit-scrollbar {
                width: 8px;
                background: #f8fafc;
            }

            #resultados-busqueda::-webkit-scrollbar-thumb {
                background: #cbd5e1;
                border-radius: 4px;
            }

            .animate-spin {
                animation: spin 1s linear infinite;
            }

            @keyframes spin {
                100% {
                    transform: rotate(360deg);
                }
            }
        </style>
    @endpush
    @stack('scripts')

</body>

</html>
