@extends('layouts.app-master')

@section('content')
<h1>Registrar Licencia</h1>

<form action="{{ route('licencias.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="numero_licencia" class="form-label">Número de Licencia</label>
        <input type="text" name="numero_licencia" class="form-control" id="numero_licencia" required>
        @error('numero_licencia')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="fecha_expedicion" class="form-label">Fecha de Expedición</label>
        <input type="date" name="fecha_expedicion" class="form-control" id="fecha_expedicion" required>
        @error('fecha_expedicion')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento</label>
        <input type="date" name="fecha_vencimiento" class="form-control" id="fecha_vencimiento" required readonly>
        @error('fecha_vencimiento')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Sección para seleccionar categorías de licencia -->
    <div class="mb-3">
        <label class="form-label">Categorías de Licencia</label><br>
        @foreach($categorias as $categoria)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="categorias[]" value="{{ $categoria->id }}" id="categoria_{{ $categoria->id }}">
                <label class="form-check-label" for="categoria_{{ $categoria->id }}">
                    {{ $categoria->nombre }} - {{ $categoria->descripcion }}
                </label>
            </div>
        @endforeach
        @error('categorias')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Registrar Licencia</button>
</form>

<script>
    document.getElementById('fecha_expedicion').addEventListener('change', function() {
        // Obtener la fecha de expedición seleccionada
        let fechaExpedicion = new Date(this.value);

        // Añadir diez años a la fecha de expedición
        fechaExpedicion.setFullYear(fechaExpedicion.getFullYear() + 10);

        // Formatear la nueva fecha para el campo de vencimiento (en formato "YYYY-MM-DD")
        let year = fechaExpedicion.getFullYear();
        let month = String(fechaExpedicion.getMonth() + 1).padStart(2, '0'); // Mes (0-11, se suma 1)
        let day = String(fechaExpedicion.getDate()).padStart(2, '0'); // Día

        // Actualizar el campo de fecha de vencimiento con el nuevo valor
        document.getElementById('fecha_vencimiento').value = `${year}-${month}-${day}`;
    });
</script>
@endsection
