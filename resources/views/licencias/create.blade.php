@extends('layouts.app-master')

@section('content')
<h1>Registrar Licencia</h1>

<form action="{{ route('licencias.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="numero_licencia" class="form-label">Número de Licencia</label>
        <input type="text" name="numero_licencia" class="form-control" id="numero_licencia" required>
    </div>
    <div class="mb-3">
        <label for="fecha_expedicion" class="form-label">Fecha de Expedición</label>
        <input type="date" name="fecha_expedicion" class="form-control" id="fecha_expedicion" required>
    </div>
    <div class="mb-3">
        <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento</label>
        <input type="date" name="fecha_vencimiento" class="form-control" id="fecha_vencimiento" required>
    </div>
    <button type="submit" class="btn btn-primary">Registrar Licencia</button>
</form>
@endsection
