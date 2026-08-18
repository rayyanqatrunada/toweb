<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use LogsActivity;

    protected $fillable = ['user_id', 'name', 'nip', 'position', 'phone', 'photo', 'is_head_of_department', 'is_active'];

    protected $casts = [
        'is_head_of_department' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::saving(function ($teacher) {
            if ($teacher->is_head_of_department) {
                // Set all other teachers to false
                static::where('id', '!=', $teacher->id)->update(['is_head_of_department' => false]);
            }
        });
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty()->dontSubmitEmptyLogs();
    }
}