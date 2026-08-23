<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use \App\Traits\CleansUpFiles;
    use LogsActivity;

    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'thumbnail', 
        'status', 'published_at', 'user_id', 'category_id'
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopePublished(\Illuminate\Database\Eloquent\Builder $query): void
    {
        $query->where('status', 'published')
              ->where(function ($query) {
                  $query->whereNull('published_at')
                        ->orWhere('published_at', '<=', now());
              });
    }

    protected static function booted()
    {
        static::saved(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('homepage:news');
            \Illuminate\Support\Facades\Cache::forget('sitemap:urls');
            // Bust cache listing berita untuk halaman 1-5 yang paling sering diakses
            for ($i = 1; $i <= 5; $i++) {
                \Illuminate\Support\Facades\Cache::forget("news:index:page:{$i}");
            }
        });
        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('homepage:news');
            \Illuminate\Support\Facades\Cache::forget('sitemap:urls');
            for ($i = 1; $i <= 5; $i++) {
                \Illuminate\Support\Facades\Cache::forget("news:index:page:{$i}");
            }
        });
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty()->dontSubmitEmptyLogs();
    }

    public function getFileFields(): array
    {
        return ['thumbnail'];
    }
}
