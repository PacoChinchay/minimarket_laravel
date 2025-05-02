<x-app-layout>
    <div>
        <div>
            hola @auth
                {{ Auth::user()->name }}
            @endauth
        </div>
        <a href="{{ route('logout') }}">
            <button>Salir</button>
        </a>
    </div>
    <div>
        <h2>Hola guap@, esta es la vista secreta</h2>
    </div>
</x-app-layout>
