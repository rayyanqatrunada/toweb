<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use \App\Traits\CleansUpFiles;
    use LogsActivity;

    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'category_id', 'level', 'rank', 'organizer', 'date', 
        'description', 'photo', 'status', 'published_at', 'meta_title', 'meta_description'
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'published_at' => 'datetime',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
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
            \Illuminate\Support\Facades\Cache::forget('homepage:stats:achievement');
        });
        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('homepage:stats:achievement');
        });
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty()->dontSubmitEmptyLogs();
    }

    public function getFileFields(): array
    {
        return ['photo'];
    }
}
