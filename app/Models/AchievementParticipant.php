<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Model;

class AchievementParticipant extends Model
{
    use LogsActivity;

    protected $fillable = ['achievement_id', 'student_name', 'student_id'];

    public function achievement()
    {
        return $this->belongsTo(Achievement::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty()->dontSubmitEmptyLogs();
    }
}