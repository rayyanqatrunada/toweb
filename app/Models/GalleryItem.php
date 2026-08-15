<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class GalleryItem extends Model
{
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
        });

        static::deleted(function ($item) {
            if ($item->file_path && Storage::disk('public')->exists($item->file_path)) {
                Storage::disk('public')->delete($item->file_path);
            }
        });
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty()->dontSubmitEmptyLogs();
    }
}