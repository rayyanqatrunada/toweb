<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Alumni extends Model
{
    use \App\Traits\CleansUpFiles;
    use LogsActivity;

    use HasFactory;

    protected $table = 'alumni';

    protected $fillable = [
        'user_id', 'name', 'slug', 'student_id', 'graduation_year', 'photo',
        'city', 'education', 'current_occupation', 'current_company',
        'bio', 'achievements', 'is_public', 'status', 'published_at',
        'meta_title', 'meta_description'
    ];

    protected function casts(): array
    {
        return [
            'is_public' => 'boolean',
            'graduation_year' => 'integer',
            'published_at' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
        static::saved(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('homepage:stats:alumni');
            \Illuminate\Support\Facades\Cache::forget('homepage:alumnis');
        });
        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('homepage:stats:alumni');
            \Illuminate\Support\Facades\Cache::forget('homepage:alumnis');
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
