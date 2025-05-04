<div class="flex w-full bg-white">
  <header class="flex justify-between items-center w-full max-w-7xl h-[80px] mx-auto px-4">
    <!-- Logo -->
    <div class="flex items-center">
     <a href="/">
      <img src="header/logo.png" alt="Logo Minimarket" class="h-16 object-contain cursor-pointer">
     </a>
    </div>

    <!-- Buscador -->
    <div class="flex items-center gap-2 bg-gray-100 rounded-full px-2 py-2 w-full max-w-md">
      <input 
        type="text" 
        placeholder="Encuentra tu producto..." 
        class="flex-grow bg-transparent outline-none placeholder-gray-500 text-sm ml-2"
      >
      <button 
        type="submit" 
        class="bg-[#5C8B2D] hover:bg-[#4a7224] transition-colors text-white font-semibold text-sm px-4 py-2 rounded-full cursor-pointer"
      >
        Buscar
      </button>
    </div>

    <!-- Carrito y Usuario -->
    <div class="flex items-center gap-6 ml-6">
      <div class="relative cursor-pointer">
        <a href="store/cart">
        <img src="header/cart.svg" alt="Carrito" class="w-6 h-6">
        </a>
        <span class="absolute -top-2 -right-2 bg-[#5C8B2D] text-white text-[10px] font-bold rounded-full px-1.5 py-0.5">
          0
        </span>
      </div>
      <div class="cursor-pointer">
        <a href="/login">
          <img src="header/user.svg" alt="Usuario" class="w-6 h-6">
        </a>
      </div>
    </div>
  </header>
</div>
<footer class="w-full bg-[#f6edd9] py-4 shadow-md">
  <div class="max-w-5xl mx-auto text-center">
    <nav class="flex justify-around flex-wrap text-[#5C8B2D] font-semibold text-base hover:text-[#3e611d]">
      <a 
        href="/" 
        class="transition-colors duration-300 hover:underline"
      >Inicio</a>
      <a 
        href="store/products" 
        class="transition-colors duration-300 hover:underline"
      >Productos</a>
      <a 
        href="/offerts" 
        class="transition-colors duration-300 hover:underline"
      >Ofertas</a>
      <a 
        href="/about-us" 
        class="transition-colors duration-300 hover:underline"
      >Sobre Nosotros</a>
    </nav>
  </div>
</footer>

