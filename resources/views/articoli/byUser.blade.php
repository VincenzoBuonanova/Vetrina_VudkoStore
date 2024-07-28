<x-layout>
	<div class="container my-5">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center">Tutti i prodotti caricati da: {{$user->name}}</h1>
			</div>
		</div>
	</div>
	<div class="container my-5">
		<div class="row justify-content-center">
			@foreach($user->articles as $article)
			@if ($article->is_accepted == 1)
			<div class="col-12 col-md-3 m-4">
				<x-card
				:article="$article"
				:category="$article->category"
				:user="$article->user"/>
			</div>
			@endif
			@endforeach
		</div>
	</div>
</x-layout>