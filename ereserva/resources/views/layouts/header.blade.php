<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <div class="col-auto me-auto">
            <img src="{{ asset('img/logo max4.jpg') }}" alt="MAX4 Technologies Logo" width="100" height="50"
            loading="lazy" class="rounded-float-start">
        </div>
        <div class="col-auto me-auto">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('home2') }}" style="color:white"><i
                            class="fa-solid fa-paper-plane pe-2" style="color:white"></i>Solicitudes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('citas') }}" style="color:white"><i
                            class="fa-solid fa-calendar-check pe-2" style="color:white"></i>Citas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('eventos.index') }}" style="color:white"><i
                            class="fa-solid fa-calendar-days pe-2" style="color:white"></i>Eventos</a>
                </li>
            </ul>
        </div>

        <div class="col-auto">
            <li class="nav-item dropdown">
                <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user" style="color:white">
                    <div class="d-sm-none d-lg-inline-block">Admin</div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"
                        onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt ms-0 me-2"></i> Cerrar Sesión
                    </a>
                    {{-- <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                        {{ csrf_field() }}
                    </form> --}}
                </div>
            </li>
        </div>
    </div>
</nav>
