<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class Download extends Model
{
    use \App\Traits\CleansUpFiles;
    use LogsActivity;

    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'description', 'file_path', 'download_category_id', 'is_public',
        'file_name', 'file_type', 'file_size', 'download_count', 'status',
        'published_at', 'meta_title', 'meta_description', 'sort_order'
    ];

    protected function casts(): array
    {
        return [
            'is_public' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    public function category()
    {
        return $this->belongsTo(DownloadCategory::class, 'download_category_id');
    }

    public function scopePublished(Builder $query): void
    {
        $query->where('status', 'published')
              ->where(function ($query) {
                  $query->whereNull('published_at')
                        ->orWhere('published_at', '<=', now());
              });
    }

    public function scopePublic(Builder $query): void
    {
        $query->published()->where('is_public', true);
    }

    protected static function booted()
    {
        // Removed old deleted hook
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
