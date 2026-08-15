<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use LogsActivity;

    protected $fillable = ['title', 'slug', 'content', 'thumbnail', 'status'];

    protected function casts(): array
    {
        return [
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty()->dontSubmitEmptyLogs();
    }
}