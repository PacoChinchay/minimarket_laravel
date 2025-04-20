<x-app-layout>
  <h1>Login</h1>
  <form action="{{route('star-session')}}" method="POST">
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
      <input type="checkbox" name="remember">
      <label> Manetener sesión iniciada</label>
    </div>
    <div>
      <p>¿No tienes cuenta? <a href="{{route('register')}}">Regístrate</a></p>
    </div>
    <button type="submit">Acceder</button>
  </form>
</x-app-layout>