<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Tutti i prodotti</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            @if (@session('prodottoCaricato'))
                <div id="success-alert" class="alert alert-success fw-normal fst-italic">
                    {{ session('prodottoCaricato') }}
                </div>
            @endif
            @foreach ($articles as $article)
                <div class="col-12 col-lg-3 m-4">
                    <x-card :article="$article" :category="$article->category" />
                </div>
            @endforeach
            @if (count($articles) == 0)
                <div class="col-12 col-md-5 m-4">
                    <p class="alert alert-warning text-center">Non ci sono prodotti in vendita.</p>
                </div>
                <div class="row justify-content-center ">
                    <div class="col-12 col-md-4 text-center">
                        <a href="{{ route('createArticle') }}">
                            <button class="btn btn-dark text-or">Sii il primo a creare un annuncio</button>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div>
            {{ $articles->links() }}
        </div>
    </div>

</x-layout>