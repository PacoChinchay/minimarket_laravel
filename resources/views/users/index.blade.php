<x-app-layout>
    <h1>Relación de usuarios</h1>
    <a href="/users/create">Nuevo Usuario</a>
    <table>
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Email</td>
                <td>tipo</td>
                <td>acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->type }}</td>

                    <td>
                        <a href="/users/{{ $user->id }}/edit">✏️ Editar</a> |
                        <form action='/users/{{ $user->id }}' method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('¿Estás seguro?')">🗑️ Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
