<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use Searchable;
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

    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public static function toBeRevisitedCount()
    {
        return Article::where('is_accepted', null)->count();
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'brand' => $this->brand,
            'modello' => $this->modello,
            'price' => $this->price,
            'body' => $this->body,
            'user' => $this->user,
            'category' => $this->category,
        ];
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
