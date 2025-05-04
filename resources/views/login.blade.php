<x-app-layout>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li class="my-2 text-red-500">{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <div class="min-h-screen flex items-center justify-center bg-[#f6fbee] px-4">
        <form action="{{ route('auth.login') }}" method="POST"
            class="bg-white shadow-md rounded-2xl px-10 pt-8 pb-10 w-full max-w-md border border-[#84976d]">
            @csrf

            <h2 class="text-2xl font-bold mb-6 text-[#5c8b2d] text-center">Iniciar Sesión</h2>

            <div class="mb-4">
                <label class="block text-[#5c8b2d] font-semibold mb-2">Email</label>
                <input type="email" name="email"
                    class="w-full px-4 py-2 border rounded-xl border-[#84976d] focus:outline-none focus:ring-2 focus:ring-[#5c8b2d]"
                    required value="{{ old('email') }}">
            </div>

            <div class="mb-4">
                <label class="block text-[#5c8b2d] font-semibold mb-2">Password</label>
                <input type="password" name="password"
                    class="w-full px-4 py-2 border rounded-xl border-[#84976d] focus:outline-none focus:ring-2 focus:ring-[#5c8b2d]"
                    required>
            </div>

            <div class="mb-4 flex items-center">
                <input type="checkbox" name="remember" class="mr-2 accent-[#5c8b2d]">
                <label class="text-sm text-[#5c8b2d]">Mantener sesión iniciada</label>
            </div>

            <div class="mb-6 text-sm text-center">
                <p class="text-[#84976d]">¿No tienes cuenta?
                    <a href="{{ route('register') }}"
                        class="text-[#5c8b2d] font-semibold hover:underline">Regístrate</a>
                </p>
            </div>

            <button type="submit"
                class="w-full bg-[#5c8b2d] text-white font-semibold py-2 rounded-xl hover:bg-[#4a7124] transition duration-300">Acceder</button>
        </form>
    </div>
</x-app-layout>
