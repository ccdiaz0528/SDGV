<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SDGV</title>
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>
<body>
        @include('layouts.partials.navbar')
    <main class="form-container">
        @yield('content')
    </main>
    <script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
    <footer class="footer">
        <div class="footer-content">
            <p>© 2024 Sistema de Documentación de Vehículos. Todos los derechos reservados.</p>
            <p>Desarrollado con pasión por Cristian Diaz - Carlos Camacho.</p>
        </div>
    </footer>
</body>
</html>

