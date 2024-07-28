<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('articoli.create', compact('categories'));
    }

    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(6);
        return view('articoli.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articoli.show', compact('article'));
    }


    public function byCategory(Category $category)
    {
        $articles = $category->articles()->where('is_accepted', true);
        return view('articoli.byCategory', compact('articles', 'category'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand' => 'required|string|max:255',
            'modello' => 'required|string|max:255',
            'price' => 'required|numeric',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $article = new Article();
        $article->brand = $validatedData['brand'];
        $article->modello = $validatedData['modello'];
        $article->price = $validatedData['price'];
        $article->body = $validatedData['body'];
        $article->category_id = $validatedData['category_id'];
        $article->user_id = auth()->id();
        $article->save();

        return redirect()->route('articles.index')->with('prodottoCaricato', 'Articolo creato con successo');
    }

    public function byUser() {
        return view('articoli.byUser', compact('user'));
    }




    public function addFavorite($id)
    {
        try {
            $article = Article::findOrFail($id);
            $user = Auth::user();

            if (!$user->hasFavorite($article)) {
                $user->addFavorite($article);
                return redirect()->back()->with('aggiuntoPreferito', 'Prodotto aggiunto ai preferiti')->withFragment('favorite-section');
            }

            return redirect()->back()->with('message', 'Prodotto già nei preferiti')->withFragment('favorite-section');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Si è verificato un errore, riprova più tardi');
        }
    }

    public function removeFavorite($id)
    {
        try {
            $article = Article::findOrFail($id);
            $user = Auth::user();

            if ($user->hasFavorite($article)) {
                $user->removeFavorite($article);
                return redirect()->back()->with('rimossoPreferito', 'Prodotto rimosso dai preferiti')->withFragment('unfavorite-section');
            }

            return redirect()->back()->with('message', 'Prodotto non nei preferiti')->withFragment('unfavorite-section');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Si è verificato un errore, riprova più tardi');
        }
    }

    public function favorites()
    {
        $user = Auth::user();
        $articles = $user->favoritearticles;

        return view('articoli.favorites', compact('articles'));
    }


    public function deleteArticleP($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect(route('home'))->with('prodottoEliminato', 'Prodotto eliminato');
    }
}
