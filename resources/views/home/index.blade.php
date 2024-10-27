<!-- extiende de la vista app-master-->
    @extends('layouts.app-master')
    @section('content')
    <h1>Bienvenido {{auth()->user()->username}} a SDGV</h1>
        @auth
            <p> Estas Autentificado!</p>
        @endauth

    @endsection
