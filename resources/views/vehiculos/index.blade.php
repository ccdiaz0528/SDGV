@extends('layouts.app-master')

@section('content')
    <h1>Vehículos Registrados</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="border-end">Marca</th>
                <th class="border-end">Placa</th>
                <th class="border-end">Tipo de Documento</th>
                <th class="border-end">Fecha de Vencimiento</th>
                <th class="border-end">Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehiculos as $vehiculo)
                <tr>
                    <td class="border-end">{{ $vehiculo->marca }}</td>
                    <td class="border-end">{{ $vehiculo->placa }}</td>
                    <td class="border-end">
                        @foreach($vehiculo->documentacion as $doc)
                            <div class="d-flex justify-content-between align-items-center">
                                <span>
                                    {{ $doc->tipoDocumento ? $doc->tipoDocumento->nombre : 'Tipo de documento no disponible' }}
                                </span>
                                <a href="{{ route('documentacion.edit', $doc->id) }}" class="btn btn-secondary btn-sm ms-2">Editar</a>
                            </div>
                        @endforeach
                    </td>
                    <td class="border-end">
                        @foreach($vehiculo->documentacion as $doc)
                            <div>
                                {{ $doc->fecha_vencimiento }}
                            </div>
                        @endforeach
                    </td>
                    <td class="border-end">
                        @foreach($vehiculo->documentacion as $doc)
                            <div>
                                {{ $doc->fecha_vencimiento >= now() ? 'Vigente' : 'No Vigente' }}
                            </div>
                        @endforeach
                    </td>
                    <td>
                        <div class="d-flex flex-wrap gap-1">
                            <a href="{{ route('vehiculos.edit', $vehiculo->id) }}" class="btn btn-warning btn-sm">Editar Vehículo</a>
                            <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este vehículo?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar Vehículo</button>
                            </form>
                            <a href="{{ route('documentacion.create', $vehiculo->id) }}" class="btn btn-info btn-sm">Diligenciar Documentación</a>
                            <a href="{{ route('vehiculos.generarDuplicado', $vehiculo->id) }}" class="btn btn-success btn-sm">Generar Duplicado</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
