<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
    <img src="{{ asset('img/logo max4.jpg') }}" alt="MAX4 Technologies Logo" width="100" height="50" loading="lazy">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ps-4" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" href="{{ url('/home') }}"><i class="fa-solid fa-paper-plane pe-2"></i>Solicitudes</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ url('/citas') }}"><i class="fa-solid fa-calendar-check pe-2"></i>Citas</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ url('/eventos') }}"><i class="fa-solid fa-calendar-days pe-2"></i>Eventos</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

<footer class="footer">
    <div class="row justify-content-between">
        <div class="col-auto me-auto">
            <h5 class="fw-bold fs-4" style="color:aliceblue">Contacto:</h5>
            <ul>
                <li>
                    <a href="tel:+524499157710">+52 (449) 915 7710</a>
                </li>
                <li>
                    <a href="mailto:marketing@max4technologies.com">marketing@max4technologies.com</a>
                </li>
            </ul>
        </div>

        <div class="col-auto me-auto">
            <h5 class="fw-bold fs-4" style="color:aliceblue">Siguenos:</h5>
            <div class="d-flex justify-content-end pt-0 pt-sm-1">
                <ul class="list-unstyled d-flex">
                    <li class="ms-3">
                        <a class="btn_facebook" href="https://www.facebook.com/max4technologiesMX" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook-square fa-2x fa-beat" style="color:white"></i></a>
                    </li>
                    <li class="ms-3">
                        <a class="btn_instagram" href="https://www.instagram.com/max4.technologies"><i class="fa-brands fa-instagram fa-2x fa-beat" style="color:white"></i></a>
                    </li>
                    <li class="ms-3">
                        <a class="btn_linkedin" href="https://www.linkedin.com/company/max4-technologies/mycompany" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-linkedin fa-2x fa-beat" style="color:white"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>