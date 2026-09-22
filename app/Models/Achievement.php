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
        'description', 'photo', 'supporting_photos', 'status', 'published_at', 'meta_title', 'meta_description'
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'published_at' => 'datetime',
            'supporting_photos' => 'array',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function participants()
    {
        return $this->hasMany(AchievementParticipant::class);
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
            \Illuminate\Support\Facades\Cache::forget('homepage:stats:achievements');
            \Illuminate\Support\Facades\Cache::forget('homepage:achievements_list');
            \Illuminate\Support\Facades\Cache::forget('sitemap:urls');
        });
        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('homepage:stats:achievements');
            \Illuminate\Support\Facades\Cache::forget('homepage:achievements_list');
            \Illuminate\Support\Facades\Cache::forget('sitemap:urls');
        });
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty()->dontSubmitEmptyLogs();
    }

    public function getFileFields(): array
    {
        return ['photo', 'supporting_photos'];
    }
}
