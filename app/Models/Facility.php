<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use \App\Traits\CleansUpFiles;
    use LogsActivity;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'specifications',
        'photo',
        'quantity',
        'capacity',
        'safety_standards',
        'condition',
        'sort_order',
        'is_featured'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'sort_order' => 'integer',
        'quantity' => 'integer',
    ];

    public static function getCategoryOptions(): array
    {
        return [
            'tefa_workshop' => 'Bengkel Praktik & Servis AHASS',
            'electrical_lab' => 'Lab Kelistrikan & Injeksi PGM-FI',
            'engine_lab' => 'Ruang Overhaul Mesin & Presisi',
            'chassis_lab' => 'Lab Sasis & Sistem Rem',
            'theory_room' => 'Ruang Teori & Multimedia',
            'tool_storage' => 'Gudang SST & Spare Parts',
        ];
    }

    public function getCategoryLabelAttribute(): string
    {
        return static::getCategoryOptions()[$this->category] ?? 'Fasilitas Praktik';
    }

    public function getSpecificationsListAttribute(): array
    {
        if (empty($this->specifications)) {
            return [];
        }

        // Support newline-separated specifications
        $lines = preg_split('/[\r\n]+/', $this->specifications);
        return array_values(array_filter(array_map('trim', $lines)));
    }

    public function getTitleAttribute(): ?string
    {
        return $this->attributes['name'] ?? null;
    }

    public function getImageAttribute(): ?string
    {
        return $this->attributes['photo'] ?? null;
    }

    public function getSpecificationAttribute(): ?string
    {
        return $this->attributes['specifications'] ?? null;
    }

    public function getPhotoUrlAttribute(): ?string
    {
        $val = $this->photo ?? $this->attributes['photo'] ?? null;
        if (empty($val)) {
            return null;
        }
        if (str_starts_with($val, 'http://') || str_starts_with($val, 'https://')) {
            return $val;
        }
        $cleanPath = ltrim(preg_replace('#^storage/#', '', $val), '/');
        return \Illuminate\Support\Facades\Storage::url($cleanPath);
    }

    protected static function booted()
    {
        static::saved(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('homepage:stats:facilities');
            \Illuminate\Support\Facades\Cache::forget('homepage:facilities');
            \Illuminate\Support\Facades\Cache::forget('academic:facilities');
        });
        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('homepage:stats:facilities');
            \Illuminate\Support\Facades\Cache::forget('homepage:facilities');
            \Illuminate\Support\Facades\Cache::forget('academic:facilities');
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