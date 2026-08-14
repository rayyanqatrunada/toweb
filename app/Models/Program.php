<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'thumbnail'];

    public function competencies()
    {
        return $this->hasMany(Competency::class);
    }
}
