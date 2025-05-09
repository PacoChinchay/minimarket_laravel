<x-app-layout>
    <x-header />
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Sección Hero -->
        <section class="mb-16 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-[#3a5e1e] mb-6">
                Más que un minimarket,<br>somos parte de tu comunidad
            </h1>
            <p class="text-lg md:text-xl text-[#5c8b2d] max-w-3xl mx-auto">
                En MiniMarket VerdeVida llevamos 15 años sirviendo a nuestro barrio con productos frescos, calidad y atención personalizada.
            </p>
        </section>

        <!-- Nuestra Historia -->
        <section class="mb-16 grid md:grid-cols-2 gap-12 items-center">
            <div class="order-2 md:order-1">
                <h2 class="text-3xl font-bold text-[#3a5e1e] mb-6">Nuestra Historia</h2>
                <p class="text-[#5c8b2d] mb-4">
                    Todo comenzó en 2009 cuando los hermanos Pérez decidieron convertir el antiguo almacén familiar en un espacio moderno que combine la tradición de los mercados de barrio con la conveniencia de los autoservicios actuales.
                </p>
                <div class="bg-[#eaf0da] p-6 rounded-xl">
                    <p class="text-sm italic text-[#5c8b2d]">
                        "Quisimos crear un lugar donde los clientes se sientan como en casa, donde siempre encuentren productos frescos y reciban una atención amable."
                    </p>
                    <p class="mt-4 font-semibold text-[#3a5e1e]">- Familia Pérez, Fundadores</p>
                </div>
            </div>
            <div class="order-1 md:order-2">
                <img src="https://via.placeholder.com/600x400" alt="Nuestra historia" 
                     class="w-full h-auto rounded-2xl shadow-lg">
            </div>
        </section>

        <!-- Nuestros Valores -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-[#3a5e1e] mb-12 text-center">Lo que nos hace diferentes</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white p-6 rounded-xl border border-[#cddbb3] text-center">
                    <i class="fas fa-leaf text-4xl text-[#5c8b2d] mb-4"></i>
                    <h3 class="text-xl font-semibold text-[#3a5e1e] mb-2">Frescura Garantizada</h3>
                    <p class="text-[#5c8b2d]">Productos perecederos renovados diariamente</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl border border-[#cddbb3] text-center">
                    <i class="fas fa-hand-holding-heart text-4xl text-[#5c8b2d] mb-4"></i>
                    <h3 class="text-xl font-semibold text-[#3a5e1e] mb-2">Compromiso Local</h3>
                    <p class="text-[#5c8b2d]">70% de nuestros proveedores son del distrito</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl border border-[#cddbb3] text-center">
                    <i class="fas fa-clock text-4xl text-[#5c8b2d] mb-4"></i>
                    <h3 class="text-xl font-semibold text-[#3a5e1e] mb-2">Horario Extendido</h3>
                    <p class="text-[#5c8b2d]">Abiertos de 7:00 am a 11:00 pm, 365 días al año</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl border border-[#cddbb3] text-center">
                    <i class="fas fa-award text-4xl text-[#5c8b2d] mb-4"></i>
                    <h3 class="text-xl font-semibold text-[#3a5e1e] mb-2">Calidad Certificada</h3>
                    <p class="text-[#5c8b2d]">Sello de calidad municipal desde 2015</p>
                </div>
            </div>
        </section>

        <!-- Equipo -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-[#3a5e1e] mb-12 text-center">Nuestro Equipo</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl text-center">
                    <img src="https://via.placeholder.com/200x200" alt="Miembro del equipo" 
                         class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-[#cddbb3]">
                    <h3 class="text-xl font-semibold text-[#3a5e1e]">María Pérez</h3>
                    <p class="text-[#5c8b2d] mb-2">Gerente General</p>
                    <p class="text-sm text-[#84976d]">"Me encanta conocer a nuestros clientes y sus preferencias"</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl text-center">
                    <img src="https://via.placeholder.com/200x200" alt="Miembro del equipo" 
                         class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-[#cddbb3]">
                    <h3 class="text-xl font-semibold text-[#3a5e1e]">Carlos Rojas</h3>
                    <p class="text-[#5c8b2d] mb-2">Jefe de Abastecimiento</p>
                    <p class="text-sm text-[#84976d]">"Siempre buscando los mejores productos para ustedes"</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl text-center">
                    <img src="https://via.placeholder.com/200x200" alt="Miembro del equipo" 
                         class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-[#cddbb3]">
                    <h3 class="text-xl font-semibold text-[#3a5e1e]">Lucía Mendoza</h3>
                    <p class="text-[#5c8b2d] mb-2">Atención al Cliente</p>
                    <p class="text-sm text-[#84976d]">"Su satisfacción es nuestra mayor recompensa"</p>
                </div>
            </div>
        </section>

        <!-- Llamado a la acción -->
        <section class="bg-[#3a5e1e] text-white rounded-2xl p-8 md:p-12 text-center">
            <h2 class="text-3xl font-bold mb-4">¡Visítanos hoy!</h2>
            <p class="text-xl mb-6">Estamos en Av. Siempre Viva 123, Local 5</p>
            <a href="/products" 
               class="inline-block bg-white text-[#3a5e1e] px-8 py-3 rounded-full font-semibold hover:bg-[#eaf0da] transition-colors">
                Ver productos
            </a>
        </section>
    </main>

</x-app-layout>