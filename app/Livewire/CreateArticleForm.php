<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\WithFileUploads;

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

    public function store()
    {
        // Validazione dei dati del form
        $this->validate();
        // Creazione del nuovo articolo
        $this->article = Article::create([
            'brand' => $this->brand,
            'modello' => $this->modello,
            'price' => $this->price,
            'body' => $this->body,
            'category_id' => $this->category,
            'user_id' => Auth::id(),
        ]);
        // Pulizia del form
        $this->cleanForm();
        // Messaggio di successo
        Session::flash('prodottoCaricato', 'Prodotto caricato con successo, in attesa di approvazione');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.create-article-form', compact('categories'));
    }







    protected function cleanForm()
    {
        $this->reset(['brand', 'modello', 'price', 'body', 'category']);
    }
}
