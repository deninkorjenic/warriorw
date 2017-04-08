<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
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
