<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustryPartner extends Model
{
    use \App\Traits\CleansUpFiles;
    use LogsActivity;

    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'industry_type', 'description', 'address', 
        'phone', 'email', 'website', 'logo', 'status', 'published_at', 
        'meta_title', 'meta_description'
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function partnerships()
    {
        return $this->hasMany(Partnership::class);
    }

    public function internships()
    {
        return $this->hasMany(Internship::class);
    }

    public function jobVacancies()
    {
        return $this->hasMany(JobVacancy::class);
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
            // Key harus plural — sesuai HomeController::index() 'homepage:stats:partners'
            \Illuminate\Support\Facades\Cache::forget('homepage:stats:partners');
            \Illuminate\Support\Facades\Cache::forget('homepage:partners');
            \Illuminate\Support\Facades\Cache::forget('homepage:jobs');
            \Illuminate\Support\Facades\Cache::forget('sitemap:urls');
        });
        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('homepage:stats:partners');
            \Illuminate\Support\Facades\Cache::forget('homepage:partners');
            \Illuminate\Support\Facades\Cache::forget('homepage:jobs');
            \Illuminate\Support\Facades\Cache::forget('sitemap:urls');
        });
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty()->dontSubmitEmptyLogs();
    }

    public function getFileFields(): array
    {
        return ['logo'];
    }
}
