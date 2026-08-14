<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    protected $fillable = ['industry_partner_id', 'type', 'start_date', 'end_date', 'document_file', 'status'];

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
}
