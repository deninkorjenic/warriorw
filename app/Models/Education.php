<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{

    protected $table = 'educations';
    
    protected $fillable = [
        'description',
        'points',
        'week_id',
        'video_url',
    ];

    public function weeks() {
        return $this->belongsToMany(Week::class);
    }
}
