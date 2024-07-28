<x-layout>
	<div class="container my-5">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center">La tua lista preferenze</h1>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			@if (session('aggiuntoPreferito'))
			<div id="success-alert" class="alert alert-success">{{ session('aggiuntoPreferito') }}</div>
			@endif
			@if (session('rimossoPreferito'))
			<div id="success-alert" class="alert alert-warning">{{ session('rimossoPreferito') }}</div>
			@endif
			@if (session('message'))
			<div id="success-alert" class="alert alert-info">{{ session('message') }}</div>
			@endif
		</div>
	</div>

	<div class="container my-5">
		<div class="row justify-content-center">
			@foreach($articles as $article)
			@if ($article->is_accepted == 1)
			<div class="col-12 col-md-3 m-4">
				<x-card
				:article="$article"
				:category="$article->category"/>
			</div>
			@endif
			@endforeach

			@if (count($articles) == 0)
			<div class="row justify-content-center">
				<div class="col-12 col-md-5 m-4">
					<p class="alert alert-warning text-center">Non ci sono prodotti nella tua lista preferiti</p>
				</div>
			</div>
			<div class="row justify-content-center ">
				<div class="col-12 col-md-4 text-center">
					<a href="{{ route('articleIndex') }}">
						<button class="btn btn-dark text-or">Torna agli articoli</button>
					</a>
				</div>
			</div>
			@endif
		</div>
	</div>

</x-layout>