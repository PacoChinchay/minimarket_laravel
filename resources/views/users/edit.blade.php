<x-app-layout>
    <a href="/users">volver</a>
    <h1>editar usuario</h1>
    <form action="/users/{{ $user->id }}" method="POST">
        @csrf
        @method('PUT')
        <label>
            Nombre: <input type="text" name="name" value="{{ $user->name }}">
        </label>
        <label>
            Email: <input type="email" name="email" value="{{ $user->email }}">
        </label>
        <label>
            Tipo:
            <select name="type">
                <option value="cliente" {{ $user->type == 'cliente' ? 'selected' : '' }}>Cliente</option>
                <option value="empleado" {{ $user->type == 'empleado' ? 'selected' : '' }}>Empleado</option>
                <option value="admin" {{ $user->type == 'admin' ? 'selected' : '' }}>Administrador</option>
            </select>
        </label>
        <button type="submit">Guardar</button>
    </form>

</x-app-layout>
