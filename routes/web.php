<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('articolo/crea', [ArticleController::class, 'create'])->name('createArticle');

    // Route::get('/product/index', [ProductController::class, 'index'])->name('productIndex');
    // Route::get('/product/show/{product}', [ProductController::class, 'show'])->name('productShow');
    // Route::get('/product/category/{category}', [ProductController::class, 'prodByCategory'])->name('byCategory');
    // Route::get('/product/show/{product}', [ProductController::class, 'show'])->name('productShow');
    // Route::get('/product/user/{user}', [ProductController::class, 'prodByUser'])->name('byUser');
    // Route::post('/contact/submit', [PublicController::class, 'submitContact'])->name('submitContact');
    // Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
    // Route::get('/search/product', [PublicController::class, 'searchProducts'])->name('searchProduct');
    // Route::post('/product/favorite/{id}', [ProductController::class, 'addFavorite'])->name('addFavorite');
    // Route::delete('/product/unfavorite/{id}', [ProductController::class, 'removeFavorite'])->name('removeFavorite');
    // Route::get('/product/favorites', [ProductController::class, 'favorites'])->name('productFavorites');
    // Route::delete('/product/delete/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
});
