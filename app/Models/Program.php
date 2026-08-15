<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use LogsActivity;

    protected $fillable = ['name', 'slug', 'description', 'thumbnail'];

    public function competencies()
    {
        return $this->hasMany(Competency::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty()->dontSubmitEmptyLogs();
    }
}