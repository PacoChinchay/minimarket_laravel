<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<x-app-layout>
  <form class="" action="/categories" method="POST">
    @csrf

    <label class="bg-gray-200 p-2">
      Nombre: <input type="text" name="name">
    </label>
    <label>
      description: <input type="text" name="description">
    </label>

    <button type="submit">Crear</button>
  </form>
</x-app-layout>