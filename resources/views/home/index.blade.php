<!-- extiende de la vista app-master-->
    @extends('layouts.app-master')
    @section('content')
    <h1>Home</h1>
        @auth
            <p>Bienvenido {{auth()->user()->username}} Estas Autentificado!</p>
                <p>
                    <a href="/logout">Logout</a>
                </p>
        @endauth
        @guest
            <p>Para ver el contenido <a href="/login">Inicia Sesion</a></p>
            <p>¿No tienes cuenta? <a href="/register">Registrate</a></p>
        @endguest
    @endsection
