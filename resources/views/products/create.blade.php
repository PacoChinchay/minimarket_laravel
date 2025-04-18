<x-app-layout>
  <a href="/products">volver</a>
  <h1>Crear nuevo producto</h1>

  <form action="/products" method="POST">
    @csrf
    <label for="">
      Nombre:
      <input type="text" name="name">
    </label>
    <fieldset>
      <legend>Categorías:</legend>
      @foreach ($categories as $category)
        <label>
          <input type="checkbox" name="categories[]" value="{{ $category->id }}">
          {{ $category->name }}
        </label><br>
      @endforeach
      <a href="/categories/create">agregar</a>
    </fieldset>
    
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