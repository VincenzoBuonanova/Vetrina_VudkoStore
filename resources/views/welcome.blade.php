<x-layout>

    {{--! inizio sezione alert --}}
    <div class="container">
        <div class="row">
            @if (session('nonAutorizzato'))
            <div id="success-alert" id="success-alert" class="alert alert-danger fw-normal fst-italic">
                {{ session('nonAutorizzato') }}
            </div>
            @endif

            @if (session('revisorRequest'))
            <div id="success-alert" class="alert alert-success fw-normal fst-italic">
                {{ session('revisorRequest') }}
            </div>
            @endif

            @if (session('revisorCreated'))
            <div id="success-alert" class="alert alert-success fw-normal fst-italic">
                {{ session('revisorCreated') }}
            </div>
            @endif

            @if (session('rimossoPreferito'))
            <div id="success-alert" class="alert alert-warning">{{ session('rimossoPreferito') }}</div>
            @endif

            @if (session('message'))
            <div id="success-alert" class="alert alert-info">{{ session('message') }}</div>
            @endif

            @if (session('prodottoEliminato'))
            <div id="success-alert" class="alert alert-danger">{{ session('prodottoEliminato') }}</div>
            @endif
        </div>
    </div>
    {{--! fine sezione alert --}}


    <div class="container">
        <div class="row justify-content-center align-items-center imgWelcome">
        </div>
    </div>


    {{--! inizio header --}}
    <div class="container-fluid p-0">
        <div class="p-5 text-center" style="background-image: url('/storage/img/header.png'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100%; width: 100%;">
            <div class="mask" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(255, 255, 255, 0));">
                <div class="p-5 d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 h-100">
                        <h1 class="py-3 display-3 fw-semibold">Benvenuti sul VudkoStore</h1>
                        <h4 class="pt-3 pb-5 fst-italic display-6"> <img src="/storage/img/logo.png"
                            style="height: 80px" alt=""> Vendita e Riparazioni</h4>
                            @if (count($articles) != 0)
                            <div class="col-12 text-center pt-4 mt-5">
                                <a data-mdb-ripple-init class="btn btn-dark btn-lg h1"
                                href="{{ route('createArticle') }}" role="button">Aggiungi un prodotto</a>
                            </div>
                            @else
                            <div class="col-12 text-center pt-5 mt-5">
                                <a data-mdb-ripple-init class="btn btn-dark btn-lg h1"
                                href="{{ route('createArticle') }}" role="button">Sii il primo annuncio</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- fine header --}}

        {{-- inizio sezione annunci --}}
        <div class="container my-5 ">
            <div class="row justify-content-center">
                <div class="col-12 col-md-4 my-3 text-center">
                    <h3 class="display-6">{{ __('ui.lastProducts') }}</h3>
                </div>
            </div>

            <div class="row justify-content-center">
                @foreach ($articles as $article)
                <div class="col-12 col-lg-3 m-4">
                    <x-card :article="$article" :category="$article->category" />
                    </div>
                    @endforeach
                    @if (count($articles) == 0)
                    <div class="col-12 col-md-5 m-4">
                        <p class="alert alert-warning text-center">{{ __('ui.noProducts') }}</p>
                    </div>
                    <div class="row justify-content-center ">
                        <div class="col-12 col-md-4 text-center">
                            <a href="{{ route('createArticle') }}">
                                <button class="btn btn-dark text-or">{{ __('ui.firstProduct') }}</button>
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            {{-- fine sezione annunci --}}


        </x-layout>