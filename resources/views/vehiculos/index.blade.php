@extends('layouts.app-master')

@section('content')
    <h1>Vehículos Registrados</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="border-end">Marca</th>
                <th class="border-end">Placa</th>
                <th class="border-end">Color</th>
                <th class="border-end">Modelo</th>
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
                    <td class="border-end">{{ $vehiculo->color }}</td>
                    <td class="border-end">{{ $vehiculo->modelo }}</td>
                    <td class="border-end">
                        @foreach($vehiculo->documentacion as $doc)
                            <div class="d-flex justify-content-between align-items-center">
                                <span>
                                    {{ $doc->tipoDocumento ? $doc->tipoDocumento->nombre : 'Tipo de documento no disponible' }}
                                </span>
                                <a href="{{ route('documentacion.edit', $doc->id) }}" class="btn btn-secondary btn-sm ms-2">
                                    <img src="{{ asset('assets/editar.png') }}" alt="Editar Vehículo" width="12" height="12" class="" style="vertical-align: middle;">
                                </a>
                            </div>
                        @endforeach
                    </td>
                    <td class="border-end">
                        @foreach($vehiculo->documentacion as $doc)
                            <div>{{ $doc->fecha_vencimiento }}</div>
                        @endforeach
                    </td>
                    <td class="border-end">
                        @foreach($vehiculo->documentacion as $doc)
                            <div>{{ $doc->fecha_vencimiento >= now() ? 'Vigente' : 'No Vigente' }}</div>
                        @endforeach
                    </td>
                    <td>
                        <div class="d-flex flex-column gap-1">
                            <div>
                                <a href="{{ route('vehiculos.edit', $vehiculo->id) }}" class="btn btn-warning btn-sm w-100">Editar Vehículo
                                    <img src="{{ asset('assets/editar.png') }}" alt="Editar Vehículo" width="12" height="12" style="vertical-align: middle;">
                                </a>
                            </div>
                            <div>
                                <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este vehículo?');" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm w-100">Eliminar Vehículo
                                        <img src="{{ asset('assets/eliminar.png') }}" alt="Eliminar" width="15" height="15" style="vertical-align: middle;">
                                    </button>
                                </form>
                            </div>
                            <div>
                                <a href="{{ route('documentacion.create', $vehiculo->id) }}" class="btn btn-info btn-sm w-100">Diligenciar Documentación
                                    <img src="{{ asset('assets/doc.png') }}" alt="Documentación" width="18" height="18" style="vertical-align: middle;">
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('vehiculos.generarDuplicado', $vehiculo->id) }}" class="btn btn-success btn-sm w-100">Generar Duplicado
                                    <img src="{{ asset('assets/duplicado.png') }}" alt="Duplicado" width="15" height="15" style="vertical-align: middle;">
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
