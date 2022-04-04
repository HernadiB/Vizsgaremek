<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<link rel="stylesheet" href="{{asset("css/navbar_style.css")}}">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<nav class="navbar navbar-light fixed-top text-white" >
    <div class="container-fluid">
        <a class="navbar-brand" href="">Országos Pontgyűjtő</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-white" id="offcanvasNavbarLabel">Felhasználónév</h5>
                <button type="button" class="btn-close text-reset bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href=""><h4>Főoldal</h4></a>
                    </li>
                        <li class="nav-item">
                            <span><a href="" class="nav-link text-white">Barátaim</a></span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="">Országos lista</a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="">Feladataim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="">Csapatom</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="">Szintek-feladatok</a>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link btn text-white" id="logout">Kijelentkezés</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>