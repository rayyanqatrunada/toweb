<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use \App\Traits\CleansUpFiles;
    use LogsActivity;

    protected $fillable = [
        'title', 'slug', 'content', 'file_attachment', 'is_active'
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive(\Illuminate\Database\Eloquent\Builder $query): void
    {
        $query->where('is_active', true);
    }

    protected static function booted()
    {
        static::saved(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('homepage:agendas');
            \Illuminate\Support\Facades\Cache::forget('sitemap:urls');
            for ($i = 1; $i <= 5; $i++) {
                \Illuminate\Support\Facades\Cache::forget("announcements:index:page:{$i}");
            }
        });
        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('homepage:agendas');
            \Illuminate\Support\Facades\Cache::forget('sitemap:urls');
            for ($i = 1; $i <= 5; $i++) {
                \Illuminate\Support\Facades\Cache::forget("announcements:index:page:{$i}");
            }
        });
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty()->dontSubmitEmptyLogs();
    }

    public function getFileFields(): array
    {
        return ['file_attachment'];
    }
}
