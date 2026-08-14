<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competency extends Model
{
    protected $fillable = ['program_id', 'name', 'slug', 'description'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
