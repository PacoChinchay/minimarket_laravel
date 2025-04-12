<x-app-layout>
  <h1>Crear nuevo producto</h1>

  <form action="/products" method="POST">
    @csrf
    <label for="">
      Nombre:
      <input type="text" name="name">
    </label>
    <label for="">
      Categoría:
      <input type="text" name="category">
    </label>
    <label for="">
      Descripción:
      <textarea name="description"></textarea>
    </label>
    <label for="">
      Precio:
      <input type="number" name="price" step="0.01" min="0">

    </label>
    <label for="">
      Stock:
      <input type="number" name="stock">
    </label>
    <label for="">
      imagen:
      <input type="text" name="image">
    </label>

    <button type="submit">Crear</button>
  </form>
</x-app-layout>