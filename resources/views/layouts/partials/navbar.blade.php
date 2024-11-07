<nav class="navbar navbar-expand-lg" style="background-color: #ffffff;">
    <div class="container-fluid">
        <img src="{{ asset('assets/auto.png') }}" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
        <span class="navbar-brand ms-2" style="color: #000000;">SDGV</span>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-black" aria-current="page" href="/home">
                        <img src="{{ asset('assets/home.png') }}" alt="Home" width="15" height="15" class="me-2" style="vertical-align: middle;">
                        Inicio
                    </a>
                </li>
                @auth
                    @if(auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('admin.users') }}">
                                <img src="{{ asset('assets/user.png') }}" alt="Usuarios" width="15" height="15" class="me-2" style="vertical-align: middle;">
                                Usuarios
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('vehiculos.create') }}">
                                <img src="{{ asset('assets/registro_auto.png') }}" alt="Registrar Vehículo" width="18" height="18" class="me-2" style="vertical-align: middle;">
                                Registrar Vehículo
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('vehiculos.index') }}">
                                <img src="{{ asset('assets/ojo.png') }}" alt="Ver Vehículos" width="22" height="22" class="me-2" style="vertical-align: middle;">
                                Ver mis Vehículos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('licencias.create') }}">
                                <img src="{{ asset('assets/licencia.png') }}" alt="Registrar Licencia" width="22" height="22" class="me-2" style="vertical-align: middle;">
                                Registrar Licencia
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('licencias.index') }}">
                                <img src="{{ asset('assets/ojo.png') }}" alt="Ver Licencias" width="22" height="22" class="me-2" style="vertical-align: middle;">
                                Ver Licencias
                            </a>
                        </li>
                    @endif
                @endauth
            </ul>
            @auth
            <form class="d-flex" role="search">
                <ul class="navbar-nav me-5 mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets/user.png') }}" alt="User" width="30" height="30" class="rounded-circle me-2">
                            {{ auth()->user()->username }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('perfil') }}">Perfil</a></li>
                            <li><a class="dropdown-item" href="/logout">Cerrar Sesion</a></li>
                        </ul>
                    </li>
                @endauth
                @guest
                <div class="d-flex">
                    <a class="btn btn-secondary me-2" href="/login">Iniciar Sesión</a>
                    <a class="btn btn-primary" href="/register">Registrarse</a>
                </div>
                @endguest
                </ul>
            </form>
        </div>
    </div>
</nav>
