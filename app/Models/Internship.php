<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    protected $fillable = ['industry_partner_id', 'student_name', 'student_id', 'start_date', 'end_date', 'position', 'status'];

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
