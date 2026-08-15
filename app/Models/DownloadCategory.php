<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Model;

class DownloadCategory extends Model
{
    use LogsActivity;

    protected $fillable = ['name', 'slug', 'description'];

    public function downloads()
    {
        return $this->hasMany(Download::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty()->dontSubmitEmptyLogs();
    }
}