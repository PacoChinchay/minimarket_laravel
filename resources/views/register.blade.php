<x-app-layout>
  <div class="min-h-screen flex items-center justify-center bg-[#f6fbee] px-4">
    <div class="w-full max-w-md">
      <!-- Botón Volver -->
      <div class="mb-6 text-center">
        <a href="{{ route('store.index') }}" class="inline-flex items-center text-[#5c8b2d] hover:text-[#3a5e1e] transition-colors">
          <i class="fas fa-arrow-left mr-2"></i>
          Volver al inicio
        </a>
      </div>

      <form action="/validate-register" method="POST" class="bg-white shadow-md rounded-2xl px-10 pt-8 pb-10 border border-[#84976d]">
        @csrf

        <h2 class="text-2xl font-bold mb-6 text-[#5c8b2d] text-center">Registrarse</h2>

        <div class="mb-6">
          <label class="block text-[#5c8b2d] font-semibold mb-2">Nombre</label>
          <input type="text" name="name" class="w-full px-4 py-2 border rounded-xl border-[#84976d] focus:outline-none focus:ring-2 focus:ring-[#5c8b2d]" required>
        </div>

        <div class="mb-4">
          <label class="block text-[#5c8b2d] font-semibold mb-2">Email</label>
          <input type="email" name="email" class="w-full px-4 py-2 border rounded-xl border-[#84976d] focus:outline-none focus:ring-2 focus:ring-[#5c8b2d]" required>
        </div>

        <div class="mb-4">
          <label class="block text-[#5c8b2d] font-semibold mb-2">Password</label>
          <input type="password" name="password" class="w-full px-4 py-2 border rounded-xl border-[#84976d] focus:outline-none focus:ring-2 focus:ring-[#5c8b2d]" required>
        </div>

        <button type="submit" class="w-full bg-[#5c8b2d] text-white font-semibold py-2 rounded-xl hover:bg-[#4a7124] transition duration-300">Registrarse</button>
        
        <!-- Enlace a Login -->
        <div class="mt-4 text-center text-sm">
          <span class="text-[#84976d]">¿Ya tienes cuenta? </span>
          <a href="{{ route('login') }}" class="text-[#5c8b2d] font-semibold hover:underline">Inicia Sesión</a>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>