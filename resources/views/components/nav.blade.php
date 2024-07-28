<nav class="navbar navbar-expand-lg navbarCustom">
    <div class="container-fluid">
        {{--! apertura hambuger button --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{--! chiusura hambuger button --}}

        <div class="row align-items-center justify-content-between w-100">
            <div class="collapse navbar-collapse my-3 my-lg-0 w-100" id="navbarSupportedContent">
                {{--! inizio lato sinistro navbar LOGO e CATEGORIE --}}
                <div class="col-12 col-lg-4 d-lg-flex align-items-center me-auto">
                    {{--! apertura logo che riporta alla home --}}
                    <a class="navbar-brand ps-2" href="{{ route('home') }}">
                        <img src="/storage/img/logo.png" alt="VS logo_60" height="60px">
                    </a>
                    {{--! inizio sezione catalogo e categorie --}}
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link fw-semibold text-gr" href="{{ route('articleIndex') }}">Catalogo</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-warning fw-semibold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categorie
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($categories as $category)
                                <li>
                                    <a class="dropdown-item"
                                    href="{{ route('byCategory', ['category' => $category])}}">{{$category->name}}</a>
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
                    <div class="d-flex mx-0 mx-md-auto">
                        <form role="search" action="{{ route('articleSearch') }}" method="GET">
                            <div class="input-group">
                                <input id="search-input" type="search" class="form-control" name="query"
                                placeholder="Cerca un prodotto" />
                                <button id="search-button" type="submit" class="btn btn-or">
                                    <i class="fas fa-search fa-xl"></i>
                                </button>
                            </div>
                        </form>
                    </div>
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
                        <a class="text-gr" href="{{ route('favorites') }}">
                            @php
                            $user = Auth::user();
                            $favoriteArticlesCount = $user ? $user->favoriteArticles()->count() : 0;
                            @endphp
                            @if ($favoriteArticlesCount > 0)
                            <i class="fas fa-heart fa-xl text-danger"></i>
                            <span class="badge rounded-pill badge-notification bg-or">
                                {{ $favoriteArticlesCount }}
                            </span>
                            @else
                            <i class="fas fa-heart fa-xl text-gr"></i>
                            <span class="badge rounded-pill badge-notification bg-or">
                                {{ $favoriteArticlesCount }}
                            </span>
                            @endif
                        </a>
                        {{-- <li class="nav-item">
                            <a class="nav-link fw-semibold text-gr" href="{{ route('home') }}">
                                <i class="fas fa-heart fa-xl text-danger"></i>
                            </a>
                        </li> --}}

                        {{--! inizio sezione revisore --}}
                        @if (Auth::user()->is_revisor == 1)
                        <li class="nav-item">
                            <a class="nav-link fw-semibold text-gr">
                                @if (\App\Models\Article::toBeRevisitedCount() > 0)
                                <i class="fas fa-bell fa-xl text-warning"></i>
                                <span class="badge rounded-pill badge-notification bg-or">
                                    {{ \App\Models\Article::toBeRevisitedCount() }}
                                </span>
                                @else
                                <i class="fas fa-bell fa-xl text-gr"></i>
                                @endif
                            </a>
                        </li>
                        @endif
                        {{--! fine sezione revisore --}}

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user fa-xl text-white ms-3"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li class="dropdown-item">Ciao, {{ Auth::user()->name }}</li>
                                <li><a class="dropdown-item" href="{{ route('createArticle') }}">Pubblica un prodotto</a></li>
                                @if (Auth::user()->is_revisor)
                                <li><a class="dropdown-item" href="{{ route('revisorIndex') }}">Area Revisore</a></li>
                                @else
                                <li><a class="dropdown-item" href="{{ route('becomeRevisor') }}">Diventa Revisore</a></li>
                                @endif
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
