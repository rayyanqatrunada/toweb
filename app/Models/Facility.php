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
            'tefa_workshop' => 'Bengkel TeFa & Servis AHASS',
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