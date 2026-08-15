<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternshipParticipant extends Model
{
    use LogsActivity;

    use HasFactory;

    protected $fillable = ['internship_id', 'student_name', 'student_id', 'role', 'status'];

    public function internship()
    {
        return $this->belongsTo(Internship::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty()->dontSubmitEmptyLogs();
    }
}