@extends('layouts.app-master')

@section('content')
<div class="welcome-container">
    @auth
        <h1 class="welcome-title">¡Bienvenido {{ auth()->user()->username }}!</h1>
        <p class="welcome-text">Has accedido al Sistema de Documentación de Vehículos (SDGV), diseñado para facilitar el registro y gestión de la documentación de tus vehículos.</p>
        <p class="welcome-text">¡Disfruta de la experiencia y mantén tu documentación al día!</p>

        <!-- Galería de imágenes -->
        <div class="gallery">
            <div class="gallery-item">
                <a href="{{ route('vehiculos.index') }}">
                    <div class="gallery-image-wrapper">
                        <img src="{{ asset('assets/auto.png') }}" alt="Vehículos" class="gallery-image">
                    </div>
                    <button class="gallery-button">Ver Vehículos</button>
                </a>
            </div>
            <div class="gallery-item">
                <a href="{{ route('licencias.index') }}">
                    <div class="gallery-image-wrapper">
                        <img src="{{ asset('assets/licencia.png') }}" alt="Licencias" class="gallery-image">
                    </div>
                    <button class="gallery-button">Ver Licencias</button>
                </a>
            </div>
        </div>

    @else
        <h1 class="welcome-title">¡Bienvenido visitante!</h1>
        <p class="welcome-text">Estás en el Sistema de Documentación de Vehículos (SDGV), donde podrás registrar y gestionar la documentación de vehículos de forma fácil y rápida.</p>
        <p class="welcome-text">Si deseas disfrutar de todas las funcionalidades, te invitamos a crear una cuenta y comenzar a gestionar tu documentación.</p>
    @endauth
</div>

<!-- Sección adicional con fondo degradado -->
<div class="project-info">
    <div class="project-info-container">
        <h2 class="project-title">¿Por qué existe SDGV?</h2>
        <p class="project-description">
            Sin las herramientas correctas, gestionar los documentos de tu vehículo puede ser complicado y costoso. SDGV te ayuda a mantener todo organizado, recordándote las fechas importantes de tus documentos y facilitando el proceso de renovación.
        </p>
        <p class="project-description">
            Nuestro objetivo es ahorrarte tiempo y dinero, para que puedas disfrutar de tu vehículo sin complicaciones adicionales.
        </p>
    </div>
</div>
<br>
@endsection
