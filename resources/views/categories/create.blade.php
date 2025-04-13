<x-app-layout>
  <form action="/categories" method="POST">
    @csrf

    <label>
      Nombre: <input type="text" name="name">
    </label>
    <label>
      description: <input type="text" name="description">
    </label>

    <button type="submit">Crear</button>
  </form>
</x-app-layout>