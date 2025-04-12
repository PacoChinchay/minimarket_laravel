<x-app-layout>
  <h1>Editar producto</h1>

  <form action="/products/{{$product->id}}" method="POST">
    @csrf

    @method('PUT')

    <label for="">
      Nombre:
      <input type="text" name="name" value="{{$product->name}}">
    </label>
    <label for="">
      Categoría:
      <input type="text" name="category" value="{{ $product->categories->pluck('name')->join(', ') }}">
    </label>
    <label for="">
      Descripción:
      <textarea name="description">{{$product->description}}</textarea>
    </label>
    <label for="">
      Precio:
      <input type="number" name="price" step="0.01" min="0" value="{{$product->price}}">

    </label>
    <label for="">
      Stock:
      <input type="number" name="stock" value="{{$product->stock}}">
    </label>
    <label for="">
      imagen:
      <input type="text" name="image" value="{{$product->image}}">
    </label>

    <button type="submit">Actualizar</button>
  </form>
</x-app-layout>

{{-- <select name="categories[]" multiple>
  @foreach($allCategories as $category)
    <option value="{{ $category->id }}"
      {{ $product->categories->contains($category->id) ? 'selected' : '' }}>
      {{ $category->name }}
    </option>
  @endforeach
</select> --}}