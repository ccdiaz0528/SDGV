@extends('layouts.app-master')

@section('title', 'Registro')

@section('content')
<div class="container mt-5">
    <h2>Registro de Usuario</h2>
    
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <!-- Primera fila: Información de Usuario -->
        <div class="row mb-4">
            <h4>Información de Usuario</h4>
            <div class="col-md-6">
                <label for="username">Nombre de usuario</label>
                <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                @error('username')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="email">Correo</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mt-3">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control" required>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mt-3">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
        </div>

        <!-- Segunda fila: Información del Cliente -->
        <div class="row mb-4">
            <h4>Información del Cliente</h4>
            <div class="col-md-6">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
                @error('nombre')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" class="form-control" value="{{ old('apellido') }}">
                @error('apellido')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mt-3">
                <label for="cedula">Cédula</label>
                <input type="text" name="cedula" class="form-control" value="{{ old('cedula') }}">
                @error('cedula')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mt-3">
                <label for="telefono">Teléfono(Opcional)</label>
                <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}">
                @error('telefono')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-12 mt-3">
                <label for="direccion">Dirección(Opcional)</label>
                <input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}">
                @error('direccion')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <!-- Botón de envío -->
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>
@endsection
