<nav class="header navbar-expand-lg">
    <div class="container-fluid">
        <img src="{{ asset('img/logo max4.jpg') }}" alt="MAX4 Technologies Logo" width="100"
            height="55"loading="lazy">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li>
                    <a href="{{ url('home2') }}" style="color:white"><i class="fa-solid fa-paper-plane pe-2"
                            style="color:white"></i>Solicitudes</a>
                </li>
                <li>
                    <a href="{{ route('citas') }}" style="color:white"><i class="fa-solid fa-calendar-check pe-2"
                            style="color:white"></i>Citas</a>
                </li>
                <li>
                    <a href="{{ route('eventos') }}" style="color:white"><i
                            class="fa-solid fa-calendar-days pe-2" style="color:white"></i>Eventos</a>
                </li>
            </ul>
            <div class="d-flex">
                <a class="bienvenida disabled">¡Hola! <b>{{ auth()->user()->name }}</b></a>
                <a class="salir" href="{{ route('logout') }}">Cerrar Sesión</a>
            </div>
        </div>
    </div>
</nav>
