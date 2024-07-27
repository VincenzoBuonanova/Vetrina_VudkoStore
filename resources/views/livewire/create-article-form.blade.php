<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                @if (session()->has('prodottoCaricato'))
                <div class="alert alert-success text-center">
                    {{ session('prodottoCaricato') }}
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-8 rounded shadow border p-4">
                <form wire:submit.prevent="store" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">
                            Brand:
                        </label>
                        <input type="text" wire:model.blur="brand" class="form-control @error('brand') is-invalid @enderror">
                        @error('brand')
                        <div class="alert alert-danger fst-italic small text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Modello:
                        </label>
                        <input type="text" wire:model.blur="modello" class="form-control @error('modello') is-invalid @enderror">
                        @error('modello')
                        <div class="alert alert-danger fst-italic small text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Prezzo:
                        </label>
                        <input type="number" wire:model.blur="price" class="form-control @error('price') is-invalid @enderror">
                        @error('price')
                        <div class="alert alert-danger fst-italic small text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Descrizione:
                        </label>
                        <textarea wire:model.blur="body" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror"></textarea>
                        @error('body')
                        <div class="alert alert-danger fst-italic small text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category">
                            Seleziona la categoria:
                        </label>
                        <select class="form-select" id="category" wire:model.blur="category">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="alert alert-danger fst-italic small text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    {{-- Sezione per l'inserimento delle immagini --}}
                    <div class="mb-3">
                        <label class="form-label">Carica delle immagini:</label>
                        <input type="file" multiple wire:model="temporary_images" class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img/">
                        @error('temporary_images.*')
                        <p class="fst-italic text-danger">{{ $message }}</p>
                        @enderror
                        @error('temporary_images')
                        <p class="fst-italic text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    @if (!empty($images))
                    <div class="row">
                        <div class="col-12">
                            <p>Anteprima immagini:</p>
                            <div class="row border border-4 border-warning rounded shadow py-4">
                                @foreach ($images as $key => $image)
                                <div class="col-4 d-flex flex-column align-items-center my-3">
                                    <div class="img-preview mx-auto shadow rounded" style="background-image: url({{ $image->temporaryUrl() }});"></div>
                                    <button type="button" class="btn mt-1 btn-danger" wire:click="removeImage({{ $key }})">X</button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                    <button type="submit" class="btn mt-3 btn-or">Pubblica prodotto</button>
                </form>
            </div>
        </div>
    </div>
</div>
