<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use \App\Traits\CleansUpFiles;
    use LogsActivity;

    protected $fillable = ['name', 'slug', 'description', 'thumbnail'];

    public function competencies()
    {
        return $this->hasMany(Competency::class);
    }

    protected static function booted()
    {
        static::saved(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('homepage:programs');
            \Illuminate\Support\Facades\Cache::forget('academic:programs');
        });
        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('homepage:programs');
            \Illuminate\Support\Facades\Cache::forget('academic:programs');
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
