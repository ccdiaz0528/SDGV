@extends('layouts.auth-master')

@section('content')
    <form action="/register" method="POST">
        @csrf
        <h1>Registrate</h1>
        @include('layouts.partials.messages')
        <div class="form-floating mb-3">
            <input type="text" name="username" placeholder="Usuario" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <label for="exampleInputEmail1" class="form-label">Usuario</label>
        </div>

        <div class="form-floating mb-3">
            <input type="email" name="email" placeholder="Correo" class="form-control" id="exampleInputPassword1">
            <label for="exampleInputPassword1" class="form-label">Correo</label>
        </div>

        <div class="form-floating mb-3">
            <input type="password" name="password" placeholder="Contraseña" class="form-control" id="exampleInputPassword1">
            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
        </div>

        <div class="form-floating mb-3">
            <input type="password" name="password_confirmation" placeholder="Repita la contraseña" class="form-control" id="exampleInputPassword1">
            <label for="exampleInputPassword1" class="form-label">Repita la contraseña</label>
        </div>


        <div class="mb-3">
          <a href="/login">¿Ya tienes cuenta? Inicia Sesion</a>
        </div>
        <button type="submit" class="btn btn-primary">Crear Cuenta</button>
      </form>





@endsection
