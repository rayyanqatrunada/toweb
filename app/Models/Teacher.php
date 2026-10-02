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

    protected $hidden = ['nip'];

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
            \Illuminate\Support\Facades\Cache::forget('homepage:teachers_list');
        });
        
        static::deleted(function ($teacher) {
            \Illuminate\Support\Facades\Cache::forget('academic:teachers');
            \Illuminate\Support\Facades\Cache::forget('homepage:head_of_department');
            \Illuminate\Support\Facades\Cache::forget('homepage:teachers_list');
        });

        static::saving(function ($teacher) {
            if ($teacher->is_head_of_department) {
                // Set all other teachers to false
                static::where('id', '!=', $teacher->id)->update(['is_head_of_department' => false]);
            }
        });
    }

    public function hasValidPhoto(): bool
    {
        if (empty($this->photo)) {
            return false;
        }

        if (str_starts_with($this->photo, 'http://') || str_starts_with($this->photo, 'https://')) {
            return true;
        }

        $cleanPath = ltrim(preg_replace('#^storage/#', '', $this->photo), '/');

        return \Illuminate\Support\Facades\Storage::disk('public')->exists($cleanPath)
            || file_exists(public_path('storage/' . $cleanPath))
            || file_exists(public_path($cleanPath));
    }

    public function getPhotoUrlAttribute(): ?string
    {
        if (empty($this->photo)) {
            return null;
        }

        if (str_starts_with($this->photo, 'http://') || str_starts_with($this->photo, 'https://')) {
            return $this->photo;
        }

        $cleanPath = ltrim(preg_replace('#^storage/#', '', $this->photo), '/');

        return \Illuminate\Support\Facades\Storage::disk('public')->url($cleanPath);
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
