<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class CreateArticleForm extends Component
{
    use WithFileUploads;

    #[Validate("required", message: "Il brand del prodotto è richiesto")]
    #[Validate("min:3", message: "Il brand indicato per il prodotto è troppo breve")]
    #[Validate("max:100", message: "Il brand indicato per il prodotto è troppo lungo")]
    public $brand;

    #[Validate("required", message: "Il modello del prodotto è richiesto")]
    #[Validate("min:3", message: "Il modello indicato per il prodotto è troppo breve")]
    #[Validate("max:100", message: "Il modello indicato per il prodotto è troppo lungo")]
    public $modello;

    #[Validate("required", message: "Il prezzo del prodotto è richiesto")]
    #[Validate("min:1", message: "Il prezzo del prodotto è troppo basso")]
    #[Validate("max:10", message: "Il prezzo del prodotto è troppo alto")]
    public $price;

    #[Validate("required", message: "La descrizione del prodotto è richiesta")]
    #[Validate("min:5", message: "La descrizione inserita per il prodotto è troppo breve")]
    public $body;

    #[Validate("required", message: "Scegli almeno una categoria")]
    public $category;
    public $article;
    public $temporary_images = [];
    public $images = [];

    public function store()
    {
        $this->validate();
        $this->article = Article::create([
            'brand' => $this->brand,
            'modello' => $this->modello,
            'price' => $this->price,
            'body' => $this->body,
            'category_id' => $this->category,
            'user_id' => Auth::id(),
        ]);

        if (!empty($this->images)) {
            foreach ($this->images as $image) {
                $path = $image->store('images', 'public');
                $this->article->images()->create(['path' => $path]);
            }
            File::deleteDirectory(storage_path('app/livewire-tmp'));
        }

        Session::flash('prodottoCaricato', 'Prodotto caricato con successo, in attesa di approvazione');
        $this->cleanForm();
    }


    public function render()
    {
        $categories = Category::all();
        return view('livewire.create-article-form', compact('categories'));
    }

    protected function cleanForm()
    {
        $this->reset(['brand', 'modello', 'price', 'body', 'category', 'images', 'temporary_images']);
    }

    public function updatedTemporaryImages()
    {
        $this->validate([
            'temporary_images.*' => 'image|max:2048',
            'temporary_images' => 'max:6',
        ]);

        foreach ($this->temporary_images as $image) {
            $this->images[] = $image;
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }
}
