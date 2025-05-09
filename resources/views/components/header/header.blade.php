<div class="flex w-full bg-white">
    <header class="flex justify-between items-center w-full max-w-7xl h-[70px] md:h-[80px] mx-auto px-3 sm:px-4">
        <!-- Logo Mobile -->
        <div class="flex items-center md:flex-grow-0 flex-grow">
            <a href="/" class="flex items-center">
                <img src="header/logo.png" alt="Logo" class="h-12 md:h-16 object-contain">
            </a>
        </div>

        <!-- Buscador (Oculto en mobile) -->
        <div class="hidden md:flex items-center gap-2 bg-gray-100 rounded-full px-2 py-2 w-full max-w-md mx-4">
            <input type="text" placeholder="Encuentra tu producto..."
                class="flex-grow bg-transparent outline-none placeholder-gray-500 text-sm ml-2">
            <button type="submit"
                class="bg-[#5C8B2D] hover:bg-[#4a7224] transition-colors text-white font-semibold text-sm px-4 py-2 rounded-full">
                Buscar
            </button>
        </div>

        <!-- Carrito y Usuario -->
        <div class="flex items-center gap-4 md:gap-6 ml-2 md:ml-6">
            <!-- Carrito -->
            <div class="relative p-2 hover:bg-gray-100 rounded-full transition-colors">
                <a href="store/cart" class="block relative">
                    <img src="header/cart.svg" alt="Carrito" class="w-8 h-8">
                    <span class="absolute -top-2 -right-2 bg-[#5C8B2D] text-white text-xs font-bold rounded-full px-2 py-0.5">
                        0
                    </span>
                </a>
            </div>

            <!-- Usuario -->
            @guest
            <div class="p-2 hover:bg-gray-100 rounded-full transition-colors">
                <a href="/login">
                    <img src="header/user.svg" alt="Usuario" class="w-8 h-8 md:w-6 md:h-6">
                </a>
            </div>
            @endguest

            @auth
            <!-- Menú usuario autenticado -->
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

<!-- Footer Mobile -->
<footer class="w-full bg-[#f6edd9] py-4 shadow-md">
    <div class="max-w-5xl mx-auto px-4">
        <nav class="flex justify-around gap-3 md:gap-0 text-[#5C8B2D] font-semibold text-xs md:text-base">
            <a href="/" class="py-1 hover:underline">Inicio</a>
            <a href="/products" class="py-1 hover:underline">Productos</a>
            <a href="/offerts" class="py-1 hover:underline">Ofertas</a>
            <a href="/about" class="py-1 hover:underline">Nosotros</a>
        </nav>
    </div>
</footer>