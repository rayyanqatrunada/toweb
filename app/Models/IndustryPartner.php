<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndustryPartner extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'address', 'phone', 'email', 'website', 'logo'];

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
