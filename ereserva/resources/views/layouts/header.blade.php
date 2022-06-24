<div class="header justify-content-between">
    <div>
        <img src="{{ asset('img/logo max4.jpg') }}" alt="MAX4 Technologies Logo" width="100" height="55"
            loading="lazy">
        <ul>
            <li>
                <a href="{{ url('home2') }}" style="color:white"><i class="fa-solid fa-paper-plane pe-2"
                        style="color:white"></i>Solicitudes</a>
            </li>
            <li>
                <a href="{{ route('citas') }}" style="color:white"><i class="fa-solid fa-calendar-check pe-2"
                        style="color:white"></i>Citas</a>
            </li>
            <li>
                <a href="{{ route('eventos.index') }}" style="color:white"><i class="fa-solid fa-calendar-days pe-2"
                        style="color:white"></i>Eventos</a>
            </li>
        </ul>
    </div>

    <div>
        <ul>
            <li>
                <p class="bienvenida me-2" class="text-xl">¡Hola! <b>{{ auth()->user()->name }}</b></p>
            </li>
            <li>
                <a class="logout" href="{{ route('logout') }}">Cerrar Sesión</a>
            </li>
        </ul>
    </div>
</div>