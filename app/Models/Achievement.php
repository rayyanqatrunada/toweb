<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = ['title', 'slug', 'level', 'rank', 'date', 'description', 'photo'];

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    public function participants()
    {
        return $this->hasMany(AchievementParticipant::class);
    }
}
