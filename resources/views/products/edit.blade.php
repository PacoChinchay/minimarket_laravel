<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<x-app-layout>
  <div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-md">
    <h1 class="text-3xl font-bold mb-8 text-center text-blue-600">Editar Producto</h1>

    <form action="/products/{{$product->id}}" method="POST" class="space-y-6">
      @csrf
      @method('PUT')

      <div>
        <label class="block text-gray-700 font-semibold mb-2" for="name">Nombre</label>
        <input type="text" id="name" name="name" value="{{$product->name}}" class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div>
        <label class="block text-gray-700 font-semibold mb-2" for="category">Categoría</label>
        <input type="text" id="category" name="category" value="{{ $product->categories->pluck('name')->join(', ') }}" class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div>
        <label class="block text-gray-700 font-semibold mb-2" for="description">Descripción</label>
        <textarea id="description" name="description" rows="4" class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">{{$product->description}}</textarea>
      </div>

      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-gray-700 font-semibold mb-2" for="price">Precio</label>
          <input type="number" id="price" name="price" step="0.01" min="0" value="{{$product->price}}" class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
          <label class="block text-gray-700 font-semibold mb-2" for="stock">Stock</label>
          <input type="number" id="stock" name="stock" value="{{$product->stock}}" class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
      </div>

      <div>
        <label class="block text-gray-700 font-semibold mb-2" for="image">Imagen (URL)</label>
        <input type="text" id="image" name="image" value="{{$product->image}}" class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div class="text-center">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-8 rounded-lg transition duration-300">
          Actualizar Producto
        </button>
      </div>
    </form>
  </div>
</x-app-layout>
