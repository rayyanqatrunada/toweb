<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use \App\Traits\CleansUpFiles;
    use LogsActivity;

    protected $fillable = ['user_id', 'name', 'nip', 'position', 'specialization', 'phone', 'photo', 'bio', 'is_head_of_department', 'is_active'];

    protected function casts(): array
    {
        return [
            'is_head_of_department' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::saved(function ($teacher) {
            \Illuminate\Support\Facades\Cache::forget('academic:teachers');
            \Illuminate\Support\Facades\Cache::forget('homepage:head_of_department');
        });
        
        static::deleted(function ($teacher) {
            \Illuminate\Support\Facades\Cache::forget('academic:teachers');
            \Illuminate\Support\Facades\Cache::forget('homepage:head_of_department');
        });

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

    public function getFileFields(): array
    {
        return ['photo'];
    }
}
