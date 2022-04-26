<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset("css/navbar_style.css")}}">
<nav class="navbar navbar-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" @auth href="{{route("home")}} @else href="{{route("site.login")}} @endauth">Országos Pontgyűjtő</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-white" id="offcanvasNavbarLabel">{{session('user.full_name')}}</h5>
                <button type="button" class="btn-close text-reset bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="{{route("home")}}"><h4>Főoldal</h4></a>
                        </li>
                    @endauth
                    @auth
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route("site.friends")}}">Barátaim</a>
                        </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route("site.country")}}">Országos lista</a>
                    </li>
                    @auth
                        @can('userIsBelowEighteen')
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route("site.mytasks")}}">Feladataim</a>
                        </li>
                        @endcan
                    @endauth
                    @auth
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route("site.profile")}}">Profilom</a>
                        </li>
                    @endauth
                    @auth
                        @can('hasTeam')
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route("site.myteam")}}">Csapatom</a>
                        </li>
                        @endcan
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route("site.levels")}}">Szintek-feladatok</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route("site.settings")}}">Beállítások</a>
                        </li>
                    @endauth
                    @auth
                        {!! Form::open(['route' => 'userLogout', 'method' => 'post']) !!}
                        <li class="nav-item">
                            <button class="nav-link btn text-white">Kijelentkezés</button>
                        </li>
                        {!! Form::close() !!}
                    @else
                        @if(!(Route::current()->uri() == "login"))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{route('site.login')}}">Bejelentkezés</a>
                            </li>
                        @endif
                        @if(!(Route::current()->uri() == "signup"))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{route('site.signup')}}">Regisztráció</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>