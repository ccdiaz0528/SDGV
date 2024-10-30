@extends('layouts.app-master')

@section('content')
    @auth
        <h1>¡Bienvenido {{ auth()->user()->username }}!</h1>
        <p>Has accedido al Sistema de Documentación de Vehículos (SDGV), diseñado para facilitar el registro y gestión de la documentación de tus vehículos.</p>
        <p>Aquí podrás llevar un control eficiente de la vigencia de tus documentos y recibir recordatorios oportunos para su renovación.</p>
        <p>¡Disfruta de la experiencia y mantén tu documentación al día!</p>
        <img src="{{ asset('assets\doc.png') }}" alt="Logo" width="200" height="200" class="d-inline-block align-text-top">
    @else
        <h1>¡Bienvenido visitante!</h1>
        <p>Estás en el Sistema de Documentación de Vehículos (SDGV), donde podrás registrar y gestionar la documentación de vehículos de forma fácil y rápida.</p>
        <p>Si deseas disfrutar de todas las funcionalidades, te invitamos a crear una cuenta y comenzar a gestionar tu documentación.</p>
        <img src="{{ asset('assets\doc.png') }}" alt="Logo" width="200" height="200" class="d-inline-block align-text-top">
    @endauth
@endsection
