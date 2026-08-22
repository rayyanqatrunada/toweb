<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use LogsActivity;

    use HasFactory;

    protected $fillable = [
        'industry_partner_id', 'partnership_id', 'title', 
        'start_date', 'end_date', 'status', 'description'
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    public function industryPartner()
    {
        return $this->belongsTo(IndustryPartner::class);
    }

    public function partnership()
    {
        return $this->belongsTo(Partnership::class);
    }

    public function participants()
    {
        return $this->hasMany(InternshipParticipant::class);
    }

    public function scopePublished(\Illuminate\Database\Eloquent\Builder $query): void
    {
        $query->whereIn('status', ['ongoing', 'planned', 'completed']);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty()->dontSubmitEmptyLogs();
    }
}