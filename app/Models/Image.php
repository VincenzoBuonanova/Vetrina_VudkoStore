<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $fillable = [
        'path',
        'filename',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    // public function getUrl($width, $height)
    // {
    //     $resizedFileName = pathinfo($this->path, PATHINFO_FILENAME) . "_{$width}x{$height}." . pathinfo($this->path, PATHINFO_EXTENSION);
    //     $resizedFilePath = "images/resized/{$resizedFileName}";
    //     return Storage::url($resizedFilePath);
    // }


}
