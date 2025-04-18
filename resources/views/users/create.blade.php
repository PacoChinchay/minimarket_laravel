<x-app-layout>
    <a href="/users">volver</a>
    <h1>crear un nuevo usuario</h1>
    <form action="/users" method="POST">
        @csrf
        <label>
            Nombre: <input type="text" name="name">
        </label>
        <label>
            Email: <input type="email" name="email">
        </label>
        <label>
          Tipo:
          <select name="type">
            <option value="cliente">Cliente</option>
            <option value="empleado">Empleado</option>
            <option value="admin">Administrador</option>
          </select>
        </label>        
        <label>
            Contraseña: <input type="password" name="password">
        </label>
        <button type="submit">Crear</button>
    </form>

</x-app-layout>
