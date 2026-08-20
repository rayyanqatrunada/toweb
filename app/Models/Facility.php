<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use LogsActivity;

    protected $fillable = ['name', 'slug', 'description', 'photo', 'quantity', 'condition'];

    protected static function booted()
    {
        static::saved(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('homepage:stats:facility');
            \Illuminate\Support\Facades\Cache::forget('homepage:facilities');
            \Illuminate\Support\Facades\Cache::forget('academic:facilities');
        });
        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('homepage:stats:facility');
            \Illuminate\Support\Facades\Cache::forget('homepage:facilities');
            \Illuminate\Support\Facades\Cache::forget('academic:facilities');
        });
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty()->dontSubmitEmptyLogs();
    }
}