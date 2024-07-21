<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['brand', 'modello', 'price', 'body', 'user_id', 'category_id', 'img'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getDet()
    {
        if (strlen($this->body) > 50) {
            return substr($this->body, 0, 50) . "...";
        } else {
            return $this->body;
        }
    }
}
