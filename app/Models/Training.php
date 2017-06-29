<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'description',
        'points',
        'week_id',
    ];

    public function weeks() {
        return $this->belongsToMany(Week::class);
    }
}
