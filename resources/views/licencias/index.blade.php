@extends('layouts.app-master')

@section('content')
    <h1>Licencias Registradas</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Número de Licencia</th>
                <th>Fecha de Expedición</th>
                <th>Fecha de Vencimiento</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($licencias as $licencia)
                <tr>
                    <td>{{ $licencia->numero_licencia }}</td>
                    <td>{{ $licencia->fecha_expedicion }}</td>
                    <td>{{ $licencia->fecha_vencimiento }}</td>
                    <td>
                        {{ $licencia->fecha_vencimiento >= now()->toDateString() ? 'Vigente' : 'No Vigente' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
