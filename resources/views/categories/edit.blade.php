<x-app-layout>
  <form action="/categories/{{$category->id}}" method="POST">


    <label>
      Nombre: <input type="text" name="name" value="{{$category->name}}">
    </label>
    <label>
      description: <input type="text" name="description" value="{{$category->description}}">
    </label>

    <button type="submit">Actualizar</button>
  </form>
</x-app-layout>