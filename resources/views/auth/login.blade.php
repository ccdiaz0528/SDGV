@extends('layouts.auth-master')

@section('content')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">

    <div class="card shadow p-4" style="width: 100%; max-width: 400px; border-radius: 8px;">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <h1 class="text-center mb-4">Inicia Sesión</h1>
        <form action="/login" method="POST">
            @csrf

            <div class="form-floating mb-3">
                <input type="text" name="username" class="form-control" placeholder="Usuario o Correo" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('username') }}">
                <label for="exampleInputEmail1" class="form-label">Usuario o Correo</label>
                @error('username')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="password" name="password" placeholder="Contraseña" class="form-control" id="exampleInputPassword1">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <a href="/register">Crear tu cuenta</a>
            </div>

            <button type="submit" class="btn btn-custom me-2 w-100">Iniciar Sesión</button>
        </form>
    </div>
</div>

@endsection
