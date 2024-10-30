<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Autentificacion</title>
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">

    <style>
        body{
            width: 100%;
            height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding-top: 70px;
        }

        .form-container{
            width: 400px;

        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
    </style>


</head>
<body>
    @include('layouts.partials.navbar')
    <main class="form-container">
        @yield('content')
    </main>
    <script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>

