<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    use \App\Traits\CleansUpFiles;
    use LogsActivity;

    use HasFactory;

    protected $fillable = [
        'gallery_album_id', 'file_path', 'type', 'description',
        'title', 'alt_text', 'sort_order', 'is_featured'
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
        ];
    }

    public function album()
    {
        return $this->belongsTo(GalleryAlbum::class, 'gallery_album_id');
    }

    protected static function booted()
    {
        static::saved(function ($item) {
            if ($item->is_featured) {
                GalleryItem::where('gallery_album_id', $item->gallery_album_id)
                    ->where('id', '!=', $item->id)
                    ->update(['is_featured' => false]);
            }
            \Illuminate\Support\Facades\Cache::forget('homepage:galleries');
        });

        static::deleted(function ($item) {
            \Illuminate\Support\Facades\Cache::forget('homepage:galleries');
        });
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty()->dontSubmitEmptyLogs();
    }

    public function getFileFields(): array
    {
        return ['file_path'];
    }
}
