<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'file_path', 'download_category_id', 'is_public'
    ];

    protected function casts(): array
    {
        return [
            'is_public' => 'boolean',
        ];
    }

    public function category()
    {
        return $this->belongsTo(DownloadCategory::class, 'download_category_id');
    }
}
