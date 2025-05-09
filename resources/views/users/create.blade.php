<x-app-layout>
    <a href="/users">volver</a>
    <h1>Crear nuevo usuario (Admin)</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div>
            <label>Nombre: <input type="text" name="name" required></label>
        </div>
        <div>
            <label>Email: <input type="email" name="email" required></label>
        </div>
        <div>
            @can('create', App\Models\User::class)
                <label>
                    Rol:
                    <select name="role_id">
                        <option value="{{ Role::CLIENTE }}">Cliente</option>
                        <option value="{{ Role::EMPLEADO }}">Empleado</option>
                        <option value="{{ Role::ADMINISTRADOR }}">Administrador</option>
                    </select>
                </label>
            @else
                <input type="hidden" name="role_id" value="1">
            @endcan
        </div>
        <div>
            <label>Contraseña: <input type="password" name="password" required></label>
        </div>
        <button type="submit">Crear usuario</button>
    </form>
</x-app-layout>
