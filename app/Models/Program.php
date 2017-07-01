<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{

    protected $fillable = [
        'title',
        'description',
    ];

    protected $casts = [
        'related_weeks' => 'array',
    ];

    public function weeks() {
        return $this->belongsToMany(Week::class);
    }
}
