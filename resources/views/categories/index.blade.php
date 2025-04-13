<x-app-layout>
  <h1>Categorías</h1>

  <a href="/categories/create">➕ Nueva Categoría</a>

  <table>
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Productos</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
        <tr>
          <td>{{ $category->name }}</td>
          <td>{{ $category->products_count }}</td>
          <td>
            <a href="/categories/{{ $category->id }}/edit">✏️ Editar</a> |
            <form action="/categories/{{ $category->id }}" method="POST" style="display:inline">
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
