<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">{{ $article->title }}</h1>
            </div>
        </div>
    </div>
    <div class="container my-5 ">
        <div class="row border shadow rounded p-5">
            <div class="col-12 col-lg-5">
                {{-- ! inizio carosello --}}
                <div id="carouselShow" class="carousel slide carousel-fade mx-auto">
                    {{-- ? inizio sezione con le MINIATURE --}}
                    <div class="carousel-indicators">
                        {{-- @if ($article->images->count())
                        @foreach ($article->images as $key => $image)
                        <img src="{{ Storage::url($image->path) }}"
                        alt="Immagine {{ $key + 1 }} del prodotto {{ $article->title }}"
                        data-bs-target="#carouselShow" data-bs-slide-to="{{ $key }}"
                        @if ($key == 0) class="active" aria-current="true" @endif
                        aria-label="Slide {{ $key + 1 }}">
                        @endforeach
                        @else --}}
                        @for ($i = 0; $i < 3; $i++)
                        <img src="https://picsum.photos/1000"
                        alt="Immagine segnaposto del prodotto {{ $article->title }}"
                        data-bs-target="#carouselShow" data-bs-slide-to="{{ $i }}"
                        @if ($i == 0) class="active" aria-current="true" @endif
                        aria-label="Slide {{ $i + 1 }}">
                        @endfor
                        {{-- @endif --}}
                    </div>
                    {{-- ? fine sezione con le MINIATURE --}}

                    {{-- ? inizio sezione con le immagini --}}
                    <div class="carousel-inner rounded">
                        {{-- @if ($article->images->count())
                        @foreach ($article->images as $key => $image)
                        <div class="carousel-item @if ($key == 0) active @endif" height="300px" width="300px">
                            <img src="{{ $image->getUrl(300, 300) }}" class="d-block w-100"
                            alt="Immagine {{ $key + 1 }} del prodotto {{ $article->title }}">
                        </div>
                        @endforeach
                        @else --}}
                        @for ($i = 0; $i < 3; $i++)
                        <div class="carousel-item @if ($i == 0) active @endif" height="300px" width="300px">
                            <img src="https://picsum.photos/{{ 1000 + $i }}" class="d-block w-100"
                            alt="Immagine segnaposto del prodotto {{ $article->title }}">
                        </div>
                        @endfor
                        {{-- @endif --}}
                    </div>
                    {{-- ? fine sezione con le immagini --}}

                    {{-- ? inizio sezione freccette --}}
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselShow" data-bs-slide="prev">
                        <span class="fa-solid fa-circle-chevron-left fa-2x text-dark"aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselShow" data-bs-slide="next">
                        <span class="fa-solid fa-circle-chevron-right fa-2x text-dark" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    {{-- ? fine sezione freccette --}}
                </div>
                {{-- fine carosello --}}
            </div>

            {{-- inizio card articolo --}}
            <div class="col-12 col-lg-7 ps-lg-5 d-flex align-items-center justify-content-center text-center">
                <div class="">
                    <h5 class="card-title py-4">{{ $article->title }}</h5>
                    <p class="card-text">€ {{ $article->price }}</p>
                    <p class="card-text">{{ $article->body }}</p>
                    <p class="card-text fst-italic">Categoria:
                        @if($article->category)
                        <a href="{{ route('byCategory', ['category' => $article->category->id]) }}">
                            {{ $article->category->name }}
                        </a>
                        @else
                        Categoria non disponibile
                        @endif
                    </p>

                    <p class="card-text fst-italic">Caricato da:
                        <a href="#">{{ $article->user->name }}</a>
                    </p>

                    <a href="{{ route('articleIndex') }}">
                        <button class="btn btn-or ">Torna agli articoli</button>
                    </a>

                    {{-- @if (Auth::user() && (Auth::user()->id == $article->user_id || Auth::user()->is_revisor == 1))
                    <form action="{{ route('deletearticle', $article->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ms-3"><i class="fa-regular fa-trash-can fa-lg"></i></button>
                    </form>
                    @endif --}}

                </div>
            </div>
            {{-- fine card articolo --}}
        </div>
    </div>
</div>


</x-layout>