<div style="margin-bottom:50px;">
    <div class="card-sl d-flex flex-column h-100">
        <div class="card-image card-image-prod position-relative">
            <div class="card-image card-image-prod position-relative ratio ratio-1x1">
                <img src="https://picsum.photos/300/300"
                alt="Immagine prodotto {{ $article->title }}" class="w-100 imgCard" height="300px" />
            </div>

            {{-- @if (Auth::check())
            @php
            $user = Auth::user();
            @endphp

            @if ($user->hasFavorite($article))
            <div id="favorite-section" class="card-action card-action-prod position-absolute top-0 end-0 m-2">
                <form action="{{ route('removeFavorite', $article->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background:none; border:none; padding:0;">
                        <i class="fas fa-heart fa-lg text-danger"></i>
                    </button>
                </form>
            </div>
            @else
            <div id="favorite-section" class="card-action card-action-prod position-absolute top-0 end-0 m-2">
                <form action="{{ route('addFavorite', $article->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:none; border:none; padding:0;">
                        <i class="fa-regular fa-lg fa-heart text-danger"></i>
                    </button>
                </form>
            </div>
            @endif
            @endif --}}
        </div>

        <div class="flex-grow-1 d-flex flex-column">
            <div class="card-heading card-heading-prod pb-0">
                <p class="titleCard">{{ $article->title }}</p>
            </div>

            <div class="card-text card-text-prod pt-0">
                <p class="display-6 priceCard mb-0">€ {{ $article->price }}</p>
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
                Creato da: {{ $article->user->name }}
                {{-- <a href="{{ route('byUser', $article->user) }}">{{ $article->user->name }}</a> --}}
            </div>
            @endif

            <div class="mt-auto">
                <a href="{{ route('articleShow', $article) }}" class="card-button card-button-prod">
                    Dettagli
                </a>
            </div>
        </div>
    </div>
</div>