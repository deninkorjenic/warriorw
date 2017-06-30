<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizes';

    protected $casts = [
        'answers' => 'array',
    ];

    /**
     * Get the week that owns the quiz.
     */
    public function week()
    {
        return $this->belongsTo(Week::class);
    }
}
