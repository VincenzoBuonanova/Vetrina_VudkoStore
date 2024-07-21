<nav class="navbar navbar-expand-lg navbarCustom">
    <div class="container-fluid">
        {{--todo apertura logo che riporta alla home --}}
        <a class="navbar-brand ps-3" href="{{ route('home') }}">
            <img src="/storage/img/logo.png" alt="VS logo_60" height="60px">
        </a>
        {{--todo chiusura logo che riporta alla home --}}

        {{--todo apertura hambuger button --}}
        <button class="navbar-toggler p-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars text-or fa-xl"></i>
        </button>
        {{--todo chiusura hambuger button --}}

        {{--todo inizio menu della navbar --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{--todo sezione home e categorie a sinistra --}}
            <div>
                <ul class="navbar-nav mb-2 mb-lg-0 me-auto">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <li class="nav-item">
                                <a class="nav-link fw-semibold text-gr"
                                href="{{ route('home') }}">Home</a>
                            </li>
                        </div>

                        {{--todo sezione di destra a sinistra se compatta --}}
                        <div class="d-flex align-items-center justify-content-end d-md-none">
                            @guest
                            <li class="nav-item">
                                <a class="nav-link text-gr fw-semibold" href="{{ route('login') }}">
                                    <button data-mdb-ripple-init type="button"
                                    class="btn btn-dark">Acce22di</button>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-gr fw-semibold" href="{{ route('register') }}">
                                    <button type="button" class="btn btn-dark"
                                    data-mdb-ripple-init>Registrati</button>
                                </a>
                            </li>
                            @else
                            <a class="navbar-brand ps-3 invisible d-none d-lg-block" href="{{ route('home') }}">
                                <img src="/storage/img/logo.png" alt="..." height="50px">
                            </a>
                            <div class="d-md-flex align-items-center justify-content-end d-none">
                                <i class="fas fa-bell fa-xl text-gr invisible"></i>
                                <div class="d-flex align-items-center p-3">
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

                                    {{--todo inizio sezione revisore --}}
                                    @if (Auth::user()->is_revisor == 1)
                                    <div class="dropdown ms-3">
                                        <a data-bs-toggle="dropdown" class="text-warning dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                                            @if (\App\Models\Product::toBeRevisedCount() > 0)
                                            <i class="fas fa-bell fa-xl"></i>
                                            <span class="badge rounded-pill badge-notification bg-or">
                                                {{ \App\Models\Product::toBeRevisedCount() }}
                                            </span>
                                            @else
                                            <i class="fas fa-bell fa-xl text-gr"></i>
                                            @endif
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end bg-gr" aria-labelledby="navbarDropdownMenuLink">
                                            <li>
                                                <a class="dropdown-item text-bl" href="{{ route('revisorIndex') }}">{{ __('ui.productRevision') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif
                                    {{--todo fine sezione revisore --}}

                                    {{--todo Avatar --}}
                                    <div class="dropdown">
                                        <a data-bs-toggle="dropdown" class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" aria-expanded="false">
                                            <i class="fas fa-user fa-xl text-gr ms-3"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end bg-gr" aria-labelledby="navbarDropdownMenuAvatar">
                                            <li>
                                                <a class="dropdown-item text-bl disabled" href="#">
                                                    Ciao, {{ Auth::user()->name }}</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-bl"
                                                    href="{{ route('createArticle') }}">Crea un prodotto</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-bl"
                                                    href="">{{ __('ui.listProducts') }}</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <form action="{{ route('logout') }}" method="POST" class="text-center">
                                                        @csrf
                                                        <button class="btn fw-semibold text-or" id="logout" type="submit">
                                                            Disconnettiti
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endguest
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-gr fw-semibold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Tutte le Categorie
                                    </a>
                                    <ul class="dropdown-menu bg-gr">
                                        @foreach ($categories as $category)
                                        <li>
                                            <a class="dropdown-item text-bl"
                                            href="{{ route('byCategory', $category) }}">{{ __('ui.' . $category->name) }}</a>
                                        </li>
                                        @if (!$loop->last)
                                        <hr class="dropdown-divider">
                                        @endif
                                        @endforeach
                                    </ul>
                                </li>
                            </div>

                            {{--todo sezione di destra a sinistra se compatta --}}
                        </div>
                    </ul>
                </div>

                {{--todo sezione ricerca al centro --}}
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
                {{--todo fine sezione ricerca --}}

                <div>
                    <ul class="navbar-nav mb-2 mb-lg-0 ms-auto my-3 my-md-0">
                        {{--todo sezione autenticazione --}}
                        @guest
                        <li class="nav-item d-md-flex d-none">
                            <a class="nav-link text-gr fw-semibold" href="{{ route('login') }}">
                                <button data-mdb-ripple-init type="button" class="btn btn-or">Accedi</button>
                            </a>
                        </li>
                        <li class="nav-item d-md-flex d-none">
                            <a class="nav-link text-gr fw-semibold" href="{{ route('register') }}">
                                <button type="button" class="btn btn-dark" data-mdb-ripple-init>Registrati</button>
                            </a>
                        </li>
                        @else
                        <a class="navbar-brand ps-3 invisible d-none d-lg-block" href="{{ route('home') }}">
                            <img src="/storage/img/logo.png" alt="..." height="60px">
                        </a>
                        <div class="d-md-flex align-items-center justify-content-end d-none">
                            <i class="fas fa-bell fa-xl text-gr invisible"></i>
                            <div class="d-flex align-items-center p-3">
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

                                {{--TODO inizio sezione revisore --}}
                                {{-- @if (Auth::user()->is_revisor == 1)
                                <div class="dropdown ms-3">
                                    <a data-bs-toggle="dropdown" class="text-warning dropdown-toggle hidden-arrow"
                                    href="#" id="navbarDropdownMenuLink" role="button"
                                    aria-expanded="false">
                                    @if (\App\Models\Product::toBeRevisedCount() > 0)
                                    <i class="fas fa-bell fa-xl"></i>
                                    <span class="badge rounded-pill badge-notification bg-or">
                                        {{ \App\Models\Product::toBeRevisedCount() }}
                                    </span>
                                    @else
                                    <i class="fas fa-bell fa-xl text-gr"></i>
                                    @endif
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end bg-gr"
                                aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item text-bl" href="{{ route('revisorIndex') }}">
                                        {{ __('ui.productRevision') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @endif --}}
                        {{--TODO fine sezione revisore --}}

                        {{--TODO Avatar --}}
                        <div class="dropdown">
                            <a data-bs-toggle="dropdown" class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" aria-expanded="false">
                                <i class="fas fa-user fa-xl text-gr ms-3"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end bg-gr" aria-labelledby="navbarDropdownMenuAvatar">
                                <li>
                                    <a class="dropdown-item text-bl disabled" href="#">
                                        Ciao, {{ Auth::user()->name }}</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    {{-- <li>
                                        <a class="dropdown-item text-bl"
                                        href="{{ route('productCreate') }}">{{ __('ui.productCreate') }}</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-bl"
                                        href="{{ route('productIndex') }}">{{ __('ui.listProducts') }}</a>
                                    </li> --}}
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" class="text-center">
                                            @csrf
                                            <button class="btn fw-semibold text-or" id="logout" type="submit">
                                                Disconnettiti
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endguest
                    {{--todo fine sezione autenticazione --}}
                </ul>
            </div>
        </div>
    </div>
</nav>