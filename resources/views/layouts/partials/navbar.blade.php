<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <img src="{{ asset('assets/auto.png') }}" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
      <span class="navbar-brand ms-2">SDGV</span> <!-- Título o nombre de la aplicación -->

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/home">Inicio</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ route('vehiculos.create') }}">Registrar Vehículo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('vehiculos.index') }}">Ver mis Vehículos</a>
          </li>
          @endauth
        </ul>
        @auth
        <form class="d-flex" role="search">
          <ul class="navbar-nav me-5 mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{auth()->user()->username}}
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
