<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('articoli.create', compact('categories'));
    }

    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(6);
        return view('articoli.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articoli.show', compact('article'));
    }

    public function byCategory(Category $category)
    {
        return view('articoli.byCategory', [ 'articles' => $category->articles()->paginate(6), 'category' => $category]);
    }
}
