<div style="margin-bottom:50px;">
    <div class="card-sl d-flex flex-column h-100">
        <div class="card-image card-image-prod position-relative">
            <div class="card-image card-image-prod position-relative ratio ratio-1x1">
                <img src="{{ $article->images->isNotEmpty() ? Storage::url($article->images->first()->path) : 'https://picsum.photos/1000/1000' }}"
                alt="Immagine prodotto {{ $article->title }}" class="w-100 imgCard" />
            </div>
            @if (Auth::check())
            @php
            $user = Auth::user();
            @endphp
            <div id="favorite-section" class="card-action card-action-prod position-absolute top-0 end-0 m-2">
                <form action="{{ route('addFavorite', $article->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:none; border:none; padding:0;">
                        <i class="fa-regular fa-lg fa-heart text-danger"></i>
                    </button>
                </form>
            </div>
            @endif
        </div>

        <div class="d-flex flex-column flex-grow-1">
            <div class="card-heading card-heading-prod pb-0">
                <p class="titleCard">{{ $article->brand }}: {{ $article->modello }}</p>
            </div>

            <div class="card-text card-text-prod pt-0 flex-grow-1">
                <p class="display-6 mb-0 text-center">€ {{ $article->price }}</p>
            </div>

            <div class="card-text card-text-prod">
                {{ $article->getDet() }}
            </div>

            @if ($article->category)
            <div class="card-text card-text-prod fst-italic">
                Categoria:
                <a href="{{ route('byCategory', $article->category) }}">{{$article->category->name}}</a>
            </div>
            @else
            <div class="card-text card-text-prod fst-italic">
                Categoria non disponibile.
            </div>
            @endif

            @if ($article->user)
            <div class="card-text card-text-prod fst-italic">
                Creato da: <a href="{{ route('byUser', $article->user) }}">{{ $article->user->name }}</a>
            </div>
            @endif

            <div>
                <a href="{{ route('articleShow', $article) }}" class="card-button card-button-prod mt-auto">
                    Dettagli
                </a>
            </div>
        </div>
    </div>

</div>