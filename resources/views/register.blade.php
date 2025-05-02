<x-app-layout>
  <form action="{{route('validate-register')}}" method="POST">
    @csrf

    <div>
      <label>
        Email <input type="email" name="email">
      </label>
    </div>
    <div>
      <label>
        Password <input type="password" name="password">
      </label>
    </div>
    <div>
      <label>
        Nombre <input type="text" name="name">
      </label>
    </div>
    <button type="submit">Registrarse</button>
  </form>
</x-app-layout>