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

    {{--! inizio header --}}
    <div class="container-fluid p-0">
        <div class="row justify-content-center align-items-center headerImage w-100 m-0">
            <div class="mask w-100 h-100 p-5 m-0" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(255, 255, 255, 0));">
                <div class="p-5 d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 h-100 text-center">
                        <h1 class="py-3 display-3 fw-semibold">Benvenuti sul VudkoStore</h1>
                        <h4 class="pt-3 pb-5 fst-italic display-6 d-none d-md-block"> <img src="/storage/img/logo.png"
                            style="height: 80px" alt=""> Vendita e Riparazioni</h4>
                            <div class="col-12 text-center pt-4 mt-5">
                                <a data-mdb-ripple-init class="btn btn-dark btn-lg h1"
                                href="{{ route('createArticle') }}" role="button">Aggiungi un prodotto</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--! fine header --}}

    {{--! inizio sezione annunci --}}
    <div class="container my-5 ">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 my-3 text-center">
                <h3 class="display-6">Gli ultimi annunci</h3>
            </div>
        </div>

        <div class="row justify-content-center">
            @foreach ($articles as $article)
            <div class="col-12 col-lg-3 m-4">
                <x-card
                :article="$article"
                :category="$article->category"
                />
            </div>
            @endforeach
            @if (count($articles) == 0)
            <div class="col-12 col-md-5 m-4">
                <p class="alert alert-warning text-center">Non ci sono ancora prodotti in vendita...</p>
            </div>
            @endif
        </div>
    </div>
    {{--! fine sezione annunci --}}

</x-layout>