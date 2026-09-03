<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchievementParticipant extends Model
{
    use HasFactory;

    protected $fillable = [
        'achievement_id',
        'student_name',
        'student_id',
    ];

    public function achievement()
    {
        return $this->belongsTo(Achievement::class);
    }
}
