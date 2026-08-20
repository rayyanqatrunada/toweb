<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    use \App\Traits\CleansUpFiles;
    use LogsActivity;

    use HasFactory;

    protected $fillable = [
        'industry_partner_id', 'type', 'title', 'start_date', 
        'end_date', 'description', 'document_file', 'status'
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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty()->dontSubmitEmptyLogs();
    }

    public function getFileFields(): array
    {
        return ['document_file'];
    }
}