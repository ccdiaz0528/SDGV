@extends('layouts.auth-master')

@section('content')
<div class="card shadow p-4" style="width: 100%; max-width: 400px; border-radius: 8px;">
    <h1>Registrar Vehículo</h1>
    <form action="{{ route('vehiculos.store') }}" method="POST">

        @csrf

        <div class="form-floating mb-3">
            <input type="text" name="marca" required placeholder="Marca" class="form-control" value="{{ old('marca') }}">
            <label for="marca">Marca:</label>
            @error('marca')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="placa" required placeholder="Placa" class="form-control"
                   oninput="this.value = this.value.toUpperCase()" value="{{ old('placa') }}">
            <label for="placa">Placa:</label>
            @error('placa')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="color" required placeholder="Color" class="form-control" value="{{ old('color') }}">
            <label for="color">Color:</label>
            @error('color')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="modelo" required placeholder="Modelo" class="form-control" value="{{ old('modelo') }}">
            <label for="modelo">Modelo:</label>
            @error('modelo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Registrar Vehículo</button>
    </form>
</div>
@endsection
