@extends('layouts.app-master')

@section('content')
    <h1>Editar Documentación</h1>

    <!-- Formulario para actualizar documentación -->
    <form action="{{ route('documentacion.update', $documento->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="tipo_documento_id">Tipo de Documento</label>
            <select name="tipo_documento_id" id="tipo_documento_id" class="form-control" required>
                <option value="">Selecciona un tipo</option>
                @foreach($tiposDocumentos as $tipo)
                    <option value="{{ $tipo->id }}" {{ $documento->tipo_documento_id == $tipo->id ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fecha_expedicion">Fecha de Expedición</label>
            <input type="date" name="fecha_expedicion" id="fecha_expedicion" class="form-control" value="{{ $documento->fecha_expedicion }}" required>
        </div>

        <div class="form-group">
            <label for="fecha_vencimiento">Fecha de Vencimiento</label>
            <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" value="{{ $documento->fecha_vencimiento }}" required>
        </div>

        <div class="form-group">
            <label for="entidad_emisora">Entidad Emisora</label>
            <input type="text" name="entidad_emisora" id="entidad_emisora" class="form-control" value="{{ $documento->entidad_emisora }}" required>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Actualizar Documentación</button>
    </form>
    <form action="{{ route('documentacion.destroy', $documento->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta documentación?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar Documentación</button>
    </form>
@endsection
