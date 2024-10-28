<!-- extiende de la vista app-master -->
@extends('layouts.app-master')

@section('content')
    @auth
        <h1>Bienvenido {{ auth()->user()->username }} a SDGV</h1>
        <p>Sistema de registro de documentacion de vehiculos para un mejor gestionamiento</p>
        <p>Estás autenticado!</p>
    @else
        <h1>Bienvenido visitante a SDGV</h1>
        <p>Sistema de registro de documentacion de vehiculos para un mejor gestionamiento</p>

    @endauth
@endsection
