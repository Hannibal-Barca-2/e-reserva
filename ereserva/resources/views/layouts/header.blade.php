<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
    <img src="{{ asset('img/logo max4.jpg') }}" alt="MAX4 Technologies Logo" width="100" height="50" loading="lazy" class="rounded-float-start">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ps-4" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" href="{{ url('home2') }}" style="color:white"><i class="fa-solid fa-paper-plane pe-2" style="color:white"></i>Solicitudes</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('citas') }}" style="color:white"><i class="fa-solid fa-calendar-check pe-2" style="color:white"></i>Citas</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('eventos') }}" style="color:white"><i class="fa-solid fa-calendar-days pe-2" style="color:white"></i>Eventos</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                
            </form>
        </div>
    </div>
</nav>