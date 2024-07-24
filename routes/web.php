<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/article/index', [ArticleController::class, 'index'])->name('articleIndex');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('articleShow');
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');


Route::middleware(['isRevisor'])->group(function () {
    Route::get('revisor/index', [RevisorController::class, 'index'])->name('revisorIndex');
    Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
    Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
});


Route::middleware(['auth'])->group(function () {
    Route::get('articolo/crea', [ArticleController::class, 'create'])->name('createArticle');
    Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->name('becomeRevisor');
    Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('makeRevisor');


    // Route::get('/product/user/{user}', [ProductController::class, 'prodByUser'])->name('byUser');
    // Route::post('/contact/submit', [PublicController::class, 'submitContact'])->name('submitContact');
    // Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
    // Route::get('/search/product', [PublicController::class, 'searchProducts'])->name('searchProduct');
    // Route::post('/product/favorite/{id}', [ProductController::class, 'addFavorite'])->name('addFavorite');
    // Route::delete('/product/unfavorite/{id}', [ProductController::class, 'removeFavorite'])->name('removeFavorite');
    // Route::get('/product/favorites', [ProductController::class, 'favorites'])->name('productFavorites');
    // Route::delete('/product/delete/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
});
