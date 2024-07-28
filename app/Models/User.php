<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function favoriteArticles()
    {
        return $this->belongsToMany(Article::class, 'favorite_articles')->withTimestamps();
    }

    public function addFavorite(Article $article)
    {
        $this->favoriteArticles()->attach($article->id);
    }

    public function removeFavorite(Article $article)
    {
        $this->favoriteArticles()->detach($article->id);
    }

    public function hasFavorite(Article $article)
    {
        return $this->favoriteArticles()->where('article_id', $article->id)->exists();
    }
}
