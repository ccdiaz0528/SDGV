@extends('layouts.app-master')
@section('content')
<div class="container d-flex justify-content-center align-items-center">
<div class="card shadow p-4" style="width: 100%; max-width: 400px; border-radius: 8px;">
    <h1>Editar Vehículo</h1>
    <form action="{{ route('vehiculos.update', $vehiculo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" name="marca" id="marca" class="form-control" value="{{ old('marca', $vehiculo->marca) }}" readonly>
        </div>

        <div class="form-group">
            <label for="placa">Placa:</label>
            <input type="text" name="placa" id="placa" class="form-control" value="{{ old('placa', $vehiculo->placa) }}" readonly>
        </div>

        <div class="form-group">
            <label for="color">Color:</label>
            <input type="text" name="color" id="color" class="form-control" value="{{ old('color', $vehiculo->color) }}" required>
        </div>

        <div class="form-group">
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" id="modelo" class="form-control" value="{{ old('modelo', $vehiculo->modelo) }}" readonly>
        </div>
            <br>
        <button type="submit" class="btn btn-primary">Actualizar Vehículo</button>

        <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

</div>
</div>
@endsection
