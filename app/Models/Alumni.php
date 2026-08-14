<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = 'alumni';

    protected $fillable = ['user_id', 'name', 'student_id', 'graduation_year', 'current_status', 'company_name', 'university_name', 'testimonial', 'photo'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
