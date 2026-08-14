<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'category_id', 'level', 'rank', 'organizer', 'date', 
        'description', 'photo', 'status', 'published_at', 'meta_title', 'meta_description'
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'published_at' => 'datetime',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function participants()
    {
        return $this->hasMany(AchievementParticipant::class);
    }
}
