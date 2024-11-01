@extends('layouts.app-master')

@section('content')
<h1>Licencias Registradas</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th class="border-end">Número de Licencia</th>
            <th class="border-end">Fecha de Expedición</th>
            <th class="border-end">Fecha de Vencimiento</th>
            <th class="border-end">Estado</th>
            <th class="border-end">Categorías</th> <!-- Nueva columna para categorías -->
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($licencias as $licencia)
            <tr>
                <td class="border-end">{{ $licencia->numero_licencia }}</td>
                <td class="border-end">{{ $licencia->fecha_expedicion }}</td>
                <td class="border-end">{{ $licencia->fecha_vencimiento }}</td>
                <td class="border-end">
                    {{ $licencia->fecha_vencimiento >= now() ? 'Vigente' : 'No Vigente' }}
                </td>
                <td class="border-end">
                    @foreach($licencia->categorias as $categoria)
                        <span class="badge bg-secondary">{{ $categoria->nombre }}</span> <!-- Mostrar categorías -->
                    @endforeach
                </td>
                <td>
                    <div class="d-flex flex-wrap gap-1">
                        <a href="{{ route('licencias.edit', $licencia->id) }}" class="btn btn-warning btn-sm"><img src="{{ asset('assets/editar.png') }}" alt="Editar" width="12" height="12" class="" style="vertical-align: middle;">
                            Editar</a>
                        <form action="{{ route('licencias.destroy', $licencia->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta licencia?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><img src="{{ asset('assets/eliminar.png') }}" alt="Eliminar" width="15" height="15" class="me-2" style="vertical-align: middle;">
                                Eliminar</button>
                                <a href="{{ route('licencias.generarDuplicado', $licencia->id) }}" class="btn btn-success btn-sm">
                                    Generar Duplicado <img src="{{ asset('assets/duplicado.png') }}" alt="Duplicado" width="15" height="15" style="vertical-align: middle;">
                                </a>

                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
