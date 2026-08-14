<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustryPartner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'industry_type', 'description', 'address', 
        'phone', 'email', 'website', 'logo', 'status', 'published_at', 
        'meta_title', 'meta_description'
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function partnerships()
    {
        return $this->hasMany(Partnership::class);
    }

    public function internships()
    {
        return $this->hasMany(Internship::class);
    }

    public function jobVacancies()
    {
        return $this->hasMany(JobVacancy::class);
    }
}
