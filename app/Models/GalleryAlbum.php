<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryAlbum extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'thumbnail', 'status'];

    protected function casts(): array
    {
        return [
        ];
    }

    public function items()
    {
        return $this->hasMany(GalleryItem::class);
    }
}
