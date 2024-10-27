@extends('layouts.auth-master')

@section('content')

    <form action="/login" method="POST">
        @csrf
        <h1>Inicia Sesion</h1>
        @include('layouts.partials.messages')
        <div class="form-floating mb-3">
            <input type="text" name="username" class="form-control" placeholder="Usuario o Correo" id="exampleInputEmail1" aria-describedby="emailHelp">
            <label for="exampleInputEmail1" class="form-label">Usuario o Correo</label>

        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password" placeholder="Contraseña" class="form-control" id="exampleInputPassword1">
            <label for="exampleInputPassword1" class="form-label">Password</label>
        </div>
        <div class="mb-3">
          <a href="/register">Crear tu cuenta</a>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
      </form>
@endsection
