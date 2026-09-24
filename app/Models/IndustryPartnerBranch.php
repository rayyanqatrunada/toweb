<?php

namespace App\Models;

use App\Traits\CleansUpFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class IndustryPartnerBranch extends Model
{
    use CleansUpFiles;
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'industry_partner_id',
        'name',
        'branch_code',
        'district',
        'city',
        'address',
        'phone',
        'whatsapp',
        'google_maps_url',
        'pic_name',
        'pic_phone',
        'internship_quota',
        'facilities',
        'photo',
        'is_main_branch',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_main_branch' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function partner(): BelongsTo
    {
        return $this->belongsTo(IndustryPartner::class, 'industry_partner_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getFacilitiesListAttribute(): array
    {
        if (empty($this->facilities)) {
            return [];
        }

        $lines = preg_split('/[\r\n]+/', $this->facilities);
        return array_values(array_filter(array_map('trim', $lines)));
    }

    public function getFormattedWhatsappUrlAttribute(): ?string
    {
        $raw = $this->whatsapp ?: $this->phone;
        if (empty($raw)) {
            return null;
        }

        $cleaned = preg_replace('/[^0-9]/', '', $raw);
        if (str_starts_with($cleaned, '0')) {
            $cleaned = '62' . substr($cleaned, 1);
        }

        $msg = urlencode("Halo, saya ingin menanyakan informasi seputar kemitraan & PKL siswa TBSM SMKN 1 Bangsri di {$this->name}.");
        return "https://wa.me/{$cleaned}?text={$msg}";
    }

    protected static function booted()
    {
        static::saved(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('homepage:partners');
            \Illuminate\Support\Facades\Cache::forget('industry:partner:main');
            \Illuminate\Support\Facades\Cache::forget('industry:branches:all');
        });

        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('homepage:partners');
            \Illuminate\Support\Facades\Cache::forget('industry:partner:main');
            \Illuminate\Support\Facades\Cache::forget('industry:branches:all');
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
