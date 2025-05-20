<!DOCTYPE html>
<html lang="es">

<head>
    @include('layouts.admin-head')
</head>

<body class="bg-gray-50">
    @php
        use App\Models\Role;
    @endphp
    <aside class="fixed inset-y-0 left-0 w-64 bg-[#3a5e1e] shadow-lg">
        <div class="p-4">
            <div class="mb-8 px-2">
                <h2 class="text-2xl font-bold text-white">Panel Admin</h2>
                <p class="text-sm text-[#cddbb3]">{{ Auth::user()->name }}</p>
            </div>

            <nav class="space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center px-3 py-2.5 text-sm text-white hover:bg-[#5c8b2d] rounded-lg transition-colors">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>

                @if (Auth::user()->role_id === Role::ADMINISTRADOR || Auth::user()->role_id === Role::VENDEDOR)
                    <a href="{{ route('admin.products.index') }}"
                        class="flex items-center px-3 py-2.5 text-sm text-white hover:bg-[#5c8b2d] rounded-lg">
                        <i class="fas fa-box-open mr-3"></i>
                        Productos
                    </a>
                @endif

                <a href="{{ route('admin.orders.index') }}"
                    class="flex items-center px-3 py-2.5 text-sm text-white hover:bg-[#5c8b2d] rounded-lg">
                    <i class="fas fa-receipt mr-3"></i>
                    Pedidos
                </a>

                @if (Auth::user()->role_id === Role::ADMINISTRADOR)
                    <a href="{{ route('admin.users.index') }}"
                        class="flex items-center px-3 py-2.5 text-sm text-white hover:bg-[#5c8b2d] rounded-lg">
                        <i class="fas fa-users mr-3"></i>
                        Usuarios
                    </a>
                    <a href="{{ route('admin.categories.index') }}"
                    class="flex items-center px-3 py-2.5 text-sm text-white hover:bg-[#5c8b2d] rounded-lg">
                    <i class="fas fa-tags mr-3"></i>
                    Categorías
                </a>
                @endif

                <div class="border-t border-[#5c8b2d] my-4"></div>

                <form method="POST" action="{{ route('auth.logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center px-3 py-2.5 text-sm text-white hover:bg-red-600 rounded-lg">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        Cerrar Sesión
                    </button>
                </form>
            </nav>
        </div>
    </aside>

    <main class="ml-64 p-6 min-h-screen">
        @yield('content')
    </main>
</body>

</html>
