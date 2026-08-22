<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternshipParticipant extends Model
{
    use HasFactory;

    protected $fillable = [
        'internship_id',
        'student_name',
        'student_id',
        'role',
        'status',
    ];

    public function internship()
    {
        return $this->belongsTo(Internship::class);
    }
}
