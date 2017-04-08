<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    protected $fillable  = [
        'title',
        'description',
        'week_number',
        'maximum_points',
    ];

    public function tasks() {
        return $this->belongsToMany(Task::class);
    }
}
