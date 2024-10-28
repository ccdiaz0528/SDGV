@extends('layouts.auth-master')

@section('content')
    <h1>Registrar Vehículo</h1>
    <form action="{{ route('vehiculos.store') }}" method="POST">
        @csrf
        <div class="form-floating mb-3" >
            <input type="text" name="marca" required placeholder="Marca" class="form-control">
            <label for="marca">Marca:</label>
        </div>
        <div class="form-floating mb-3" >
            <input type="text" name="placa" required placeholder="Placa" class="form-control" oninput="this.value = this.value.toUpperCase()">
            <label for="placa">Placa:</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="color" required placeholder="Color" class="form-control">
            <label for="color">Color:</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="modelo" required placeholder="Modelo" class="form-control">
            <label for="modelo">Modelo:</label>
        </div>
        <button type="submit" class="btn btn-primary">Registrar Vehículo</button>
@endsection
