<nav class="navbar navbar-expand-lg navbarCustom">
    <div class="container-fluid">
        {{--! apertura hambuger button --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{--! chiusura hambuger button --}}

        <div class="row align-items-center justify-content-between w-100">
            <div class="collapse navbar-collapse my-3 my-lg-0 w-100" id="navbarSupportedContent">
                {{--! inizio lato sinistro navbar LORO e CATEGORIE --}}
                <div class="col-12 col-lg-4 d-lg-flex align-items-center me-auto">
                    {{--! apertura logo che riporta alla home --}}
                    <a class="navbar-brand ps-2" href="{{ route('home') }}">
                        <img src="/storage/img/logo.png" alt="VS logo_60" height="60px">
                    </a>
                    {{-- <li class="nav-item">
                        <a class="nav-link fw-semibold text-gr" href="{{ route('home') }}">Home</a>
                    </li> --}}
                    {{--! inizio sezione categorie --}}
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-warning fw-semibold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categorie
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($categories as $category)
                                <li>
                                    <a class="dropdown-item"
                                    href="#">{{$category->name}}</a>
                                </li>
                                @if (!$loop->last)
                                <hr class="dropdown-divider">
                                @endif
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
                {{--! fine lato sinistro navbar --}}

                {{--! inizio centro navbar CERCA --}}
                <div class="col-12 col-lg-4 d-lg-flex mx-0 mx-lg-auto align-items-center">
                    {{-- <div class="d-flex mx-0 mx-md-auto">
                        <form role="search" action="{{ route('searchProduct') }}" method="GET">
                            <div class="input-group">
                                <input id="search-input" type="search" class="form-control" name="query"
                                placeholder="{{ __('ui.search') }}" />
                                <button id="search-button" type="submit" class="btn btn-or">
                                    <i class="fas fa-search fa-xl"></i>
                                </button>
                            </div>
                        </form>
                    </div> --}}
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Ricerca un prodotto" aria-label="Search">
                            <button class="btn btn-outline-warning" type="submit">Cerca</button>
                        </form>
                    </ul>
                </div>
                {{--! fine centro navbar --}}

                {{--! inizio lato destro navbar AUTH e AVATAR --}}
                <div class="col-12 col-lg-4 d-flex align-items-center ms-auto">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
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
                        @else
                        {{-- !inizio sezione autenticato --}}
                        {{-- <a class="text-gr" href="{{ route('productFavorites') }}">
                            @php
                            $user = Auth::user();
                            $favoriteProductsCount = $user ? $user->favoriteProducts()->count() : 0;
                            @endphp
                            @if ($favoriteProductsCount > 0)
                            <i class="fas fa-heart fa-xl text-danger"></i>
                            <span class="badge rounded-pill badge-notification bg-or">
                                {{ $favoriteProductsCount }}
                            </span>
                            @else
                            <i class="fas fa-heart fa-xl text-gr"></i>
                            <span class="badge rounded-pill badge-notification bg-or">
                                {{ $favoriteProductsCount }}
                            </span>
                            @endif
                        </a> --}}
                        <li class="nav-item">
                            <a class="nav-link fw-semibold text-gr" href="{{ route('home') }}">
                                <i class="fas fa-heart fa-xl text-danger"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user fa-xl text-white ms-3"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li class="dropdown-item">Ciao, {{ Auth::user()->name }}</li>
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
                </div>
                {{--! fine lato destro navbar --}}
            </div>
        </div>
    </div>
</nav>
