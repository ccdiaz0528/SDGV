@extends('layouts.app-master')

@section('content')
<h1>Editar Licencia</h1>

<form action="{{ route('licencias.update', $licencia->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="numero_licencia" class="form-label">Número de Licencia</label>
        <input type="text" name="numero_licencia" class="form-control" id="numero_licencia" value="{{ $licencia->numero_licencia }}" required>
        @error('numero_licencia')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="fecha_expedicion" class="form-label">Fecha de Expedición</label>
        <input type="date" name="fecha_expedicion" class="form-control" id="fecha_expedicion" value="{{ $licencia->fecha_expedicion }}" required>
        @error('fecha_expedicion')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento</label>
        <input type="date" name="fecha_vencimiento" class="form-control" id="fecha_vencimiento" value="{{ $licencia->fecha_vencimiento }}" required>
        @error('fecha_vencimiento')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <h5>Categorías</h5>
    @foreach($categorias as $categoria)
        <div class="form-check">
            <input type="checkbox" name="categorias[]" class="form-check-input" id="categoria_{{ $categoria->id }}" value="{{ $categoria->id }}"
                @if($licencia->categorias->contains($categoria->id)) checked @endif>
            <label class="form-check-label" for="categoria_{{ $categoria->id }}">{{ $categoria->nombre }} - {{ $categoria->descripcion }}</label>
        </div>
    @endforeach
    @error('categorias')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Actualizar Licencia</button>
</form>
@endsection
