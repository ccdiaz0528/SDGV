@extends('layouts.app-master') <!-- Asegúrate de que esta línea coincida con tu estructura de layouts -->

@section('content')
<br>
<div class="container d-flex justify-content-center align-items-center">
<div class="card shadow p-4" style="width: 100%; max-width: 400px; border-radius: 8px;">
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
            <input type="date" name="fecha_expedicion" class="form-control" id="fecha_expedicion" required>
            @error('fecha_expedicion')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
        </div>

        <div class="mb-3">
            <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento</label>
            <input type="date" name="fecha_vencimiento" class="form-control" id="fecha_vencimiento" required readonly>
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

        <button type="submit" class="btn btn-custom-register">Registrar Documentación</button>
    </form>
</div>
</div>
<br>
<script>
    document.getElementById('fecha_expedicion').addEventListener('change', function() {
        // Obtener la fecha de expedición seleccionada
        let fechaExpedicion = new Date(this.value);

        // Añadir un año a la fecha de expedición
        fechaExpedicion.setFullYear(fechaExpedicion.getFullYear() + 1);

        // Formatear la nueva fecha para el campo de vencimiento (en formato "YYYY-MM-DD")
        let year = fechaExpedicion.getFullYear();
        let month = String(fechaExpedicion.getMonth() + 1).padStart(2, '0'); // Mes (0-11, se suma 1)
        let day = String(fechaExpedicion.getDate()).padStart(2, '0'); // Día

        // Actualizar el campo de fecha de vencimiento con el nuevo valor
        document.getElementById('fecha_vencimiento').value = `${year}-${month}-${day}`;
    });
</script>
@endsection
