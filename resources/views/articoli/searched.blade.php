<x-layout>
	<div class="container-fluid">
		<div class="row py-5 justify-content-center align-items-center text-center">
			<div class="col-12">
				<h1 class="display-4">Risultati della ricerca per: "<span class="fst-italic">{{ $query }}</span>"</h1>
			</div>
		</div>
		<div class="row justify-content-center align-items-center pb-5">
			@forelse ($articles as $article)
			<div class="col-12 col-lg-3 m-4">
				<x-card
				:article="$article"
				:category="$article->category"/>
			</div>
			@empty
			<div class="row justify-content-center">
				<div class="col-12 col-lg-5 m-4">
					<p class="alert alert-warning text-center">Non ci sono prodotti che corrispondono alla tua ricerca.</p>
				</div>
			</div>
			@endforelse
		</div>
	</div>
    <div>
        <div class="d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    </div>
</x-layout>