<header class="header">
    <div class="container">
        <div class="logo">
            <img src="{{ asset('img/logo max4.jpg') }}" alt="MAX4 Technologies Logo" width="125"
            height="75"loading="lazy">
        </div>
        <div class="boton">
            <label for="btn-menu"><i class="fa-solid fa-bars"></i></label>
        </div>
        <input type="checkbox" id="btn-menu">
        <nav class="menu">
            <a href="{{ url('home2') }}"><i class="fa-solid fa-paper-plane pe-2"
                    style="color:white" hover="color: #53cffc"></i>Solicitudes</a>
            <a href="{{ route('citas') }}"><i class="fa-solid fa-calendar-check pe-2"
                    style="color:white"></i>Citas</a>
            <a href="{{ route('eventos.index') }}" ><i class="fa-solid fa-calendar-days pe-2"
                    style="color:white"></i>Eventos</a>
            <a class="salir" href="{{ route('logout') }}">Cerrar Sesión</a>
        </nav>
    </div>
</header>
