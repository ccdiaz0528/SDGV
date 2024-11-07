@extends('layouts.app-master')

@section('title', 'Perfil')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow p-4" style="width: 100%; max-width: 600px; border-radius: 8px;">
    <h2>Perfil del Cliente</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('perfil.guardar') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $cliente->nombre ?? '') }}" required>
            @error('nombre')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" class="form-control" value="{{ old('apellido', $cliente->apellido ?? '') }}">
            @error('apellido')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="cedula">Cédula</label>
            <input type="text" name="cedula" class="form-control" value="{{ old('cedula', $cliente->cedula ?? '') }}" required>
            @error('cedula')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="telefono">Teléfono (Opcional) </label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $cliente->telefono ?? '') }}" >
            @error('telefono')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="direccion">Dirección (Opcional) </label>
            <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $cliente->direccion ?? '') }}">
            @error('direccion')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-custom-register">Guardar Cambios</button>
    </form>
</div>
</div>
@endsection
