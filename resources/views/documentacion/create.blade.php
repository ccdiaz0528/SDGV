@extends('layouts.app-master') <!-- Asegúrate de que esta línea coincida con tu estructura de layouts -->

@section('content')
<div class="container">
    <h1>Diligenciar Documentación para el Vehículo: {{ $vehiculo->marca }} {{ $vehiculo->placa }}</h1>

    <form action="{{ route('documentacion.store') }}" method="POST">
        @csrf

        <!-- Campo oculto para el ID del vehículo -->
        <input type="hidden" name="vehiculo_id" value="{{ $vehiculo->id }}">

        <div class="mb-3">
            <label for="tipo_documento_id" class="form-label">Tipo de Documento</label>
            <select name="tipo_documento_id" class="form-select" required>
                @foreach($tiposDocumentos as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_expedicion" class="form-label">Fecha de Expedición</label>
            <input type="date" name="fecha_expedicion" class="form-control" required>
            @error('fecha_expedicion')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
        </div>

        <div class="mb-3">
            <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento</label>
            <input type="date" name="fecha_vencimiento" class="form-control" required>
            @error('fecha_vencimiento')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
        </div>

        <div class="mb-3">
            <label for="entidad_emisora" class="form-label">Entidad Emisora</label>
            <input type="text" name="entidad_emisora" class="form-control" required>
            @error('entidad_emisora')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
        </div>

        <button type="submit" class="btn btn-primary">Registrar Documentación</button>
    </form>
</div>
@endsection
