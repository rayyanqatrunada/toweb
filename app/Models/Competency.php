<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Model;

class Competency extends Model
{
    use LogsActivity;

    protected $fillable = ['program_id', 'name', 'slug', 'description'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    protected static function booted()
    {
        static::saved(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('academic:programs');
        });
        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('academic:programs');
        });
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty()->dontSubmitEmptyLogs();
    }
}