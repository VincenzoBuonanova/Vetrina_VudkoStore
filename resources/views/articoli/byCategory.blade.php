<x-layout>
	<div class="container my-5">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center">Prodotti della categoria: {{$category->name}}</h1>
			</div>
		</div>
	</div>
	<div class="container my-5">
		<div class="row justify-content-center">
			@foreach($articles as $article)
			@if ($article->is_approved == 1)
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
					<p class="alert alert-warning text-center">Non ci sono ancora prodotti in questa categoria.</p>
				</div>
			</div>
			<div class="row justify-content-center ">
				<div class="col-12 col-md-4 text-center">
					<a href="{{ route('createArticle') }}">
						<button class="btn btn-dark text-or">Aggiungi un prodotto</button>
					</a>
				</div>
			</div>
			@endif
		</div>
	</div>
</x-layout>