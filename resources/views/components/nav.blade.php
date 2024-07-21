<nav class="navbar navbar-expand-lg navbarCustom">
    <div class="container-fluid">
        {{--! apertura logo che riporta alla home --}}
        <a class="navbar-brand ps-3" href="{{ route('home') }}">
            <img src="/storage/img/logo.png" alt="VS logo_60" height="60px">
        </a>
        {{--! chiusura logo che riporta alla home --}}

        {{--! apertura hambuger button --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{--! chiusura hambuger button --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{--! inizio lato sinistro navbar --}}
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-gr" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-gr fw-semibold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Tutte le Categorie
                    </a>
                    <ul class="dropdown-menu bg-gr">
                        @foreach ($categories as $category)
                        <li>
                            <a class="dropdown-item text-bl"
                            href="#">{{$category->name}}</a>
                        </li>
                        @if (!$loop->last)
                        <hr class="dropdown-divider">
                        @endif
                        @endforeach
                    </ul>
                </li>
                @guest
                {{-- !inizio sezione accedi registrati --}}
                <li class="nav-item">
                    <a class="nav-link text-gr fw-semibold" href="{{ route('login') }}">
                        <button data-mdb-ripple-init type="button" class="btn btn-or">Accedi</button>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-gr fw-semibold" href="{{ route('register') }}">
                        <button type="button" class="btn btn-dark" data-mdb-ripple-init>Registrati</button>
                    </a>
                </li>
                {{-- !fine sezione accedi registrati --}}
                @endguest
            </ul>
            {{--! fine lato sinistro navbar --}}


            {{--! inizio centro navbar --}}
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Ricerca un prodotto" aria-label="Search">
                    <button class="btn btn-outline-warning" type="submit">Cerca</button>
                </form>
            </ul>
            {{--! fine centro navbar --}}

            {{--! inizio lato destro navbar --}}
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @guest
                {{-- ! sezione vuota --}}
                @else
                {{-- !inizio sezione autenticato --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user fa-xl text-gr ms-3"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        Ciao, {{ Auth::user()->name }}
                        <li><a class="dropdown-item" href="{{ route('createArticle') }}">Pubblica un prodotto</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><form action="{{ route('logout') }}" method="POST" class="text-center dropdown-item">
                            @csrf
                            <button class="btn btn-dark" id="logout" type="submit">
                                Disconnettiti
                            </button>
                        </form></li>
                    </ul>
                </li>
                {{-- !fine sezione autenticato --}}
                @endguest
            </ul>
            {{--! fine lato destro navbar --}}
        </div>
    </div>
</nav>
