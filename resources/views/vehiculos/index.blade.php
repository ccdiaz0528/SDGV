@extends('layouts.app-master')

@section('content')
    <h1>Vehículos Registrados</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Marca</th>
                <th>Placa</th>
                <th>Tipo de Documento</th>
                <th>Fecha de Vencimiento</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehiculos as $vehiculo)
                <tr>
                    <td>{{ $vehiculo->marca }}</td>
                    <td>{{ $vehiculo->placa }}</td>
                    <td>
                        @foreach($vehiculo->documentacion as $doc)
                        <div>
                            {{ $doc->tipoDocumento ? $doc->tipoDocumento->nombre : 'Tipo de documento no disponible' }}
                        </div>
                        @endforeach
                    </td>
                    <td>
                        @foreach($vehiculo->documentacion as $doc)
                            <div>
                                {{ $doc->fecha_vencimiento }}
                            </div>
                        @endforeach
                    </td>
                    <td>
                        @foreach($vehiculo->documentacion as $doc)
                            <div>
                                {{ $doc->fecha_vencimiento >= now() ? 'Vigente' : 'No Vigente' }}
                            </div>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('vehiculos.edit', $vehiculo->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        <a href="{{ route('documentacion.create', $vehiculo->id) }}" class="btn btn-info">Diligenciar Documentación</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
