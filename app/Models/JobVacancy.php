<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    protected $fillable = ['industry_partner_id', 'title', 'slug', 'description', 'requirements', 'status', 'deadline'];

    protected function casts(): array
    {
        return [
            'deadline' => 'date',
        ];
    }

    public function industryPartner()
    {
        return $this->belongsTo(IndustryPartner::class);
    }
}
