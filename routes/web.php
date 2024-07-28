<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
// use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/article/index', [ArticleController::class, 'index'])->name('articleIndex');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('articleShow');
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');
Route::get('/search/article', [PublicController::class, 'searchArticle'])->name('articleSearch');
Route::get('/user/{user}', [ArticleController::class, 'byUser'])->name('byUser');

//! solo per loggati
Route::middleware(['auth'])->group(function () {
    Route::get('articolo/crea', [ArticleController::class, 'create'])->name('createArticle');
    Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->name('becomeRevisor');
    Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('makeRevisor');

    Route::post('/article/favorite/{id}', [ArticleController::class, 'addFavorite'])->name('addFavorite');
    Route::delete('/article/unfavorite/{id}', [ArticleController::class, 'removeFavorite'])->name('removeFavorite');
    Route::get('/article/favorites', [ArticleController::class, 'favorites'])->name('favorites');
    Route::delete('/article/delete/{id}', [ArticleController::class, 'deleteArticle'])->name('deleteArticle');
});

//! solo per revisori
Route::middleware(['isRevisor'])->group(function () {
    Route::get('revisor/index', [RevisorController::class, 'index'])->name('revisorIndex');
    Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
    Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
    Route::post('/revisor/undo', [RevisorController::class, 'undoAction'])->name('revisorUndo');
});