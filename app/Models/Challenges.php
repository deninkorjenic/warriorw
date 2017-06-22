<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Challenges extends Model
{
    protected $fillable = [
        'challenges_set_up', 
        'challenge_1', 
        'challenge_2', 
        'challenge_3', 
        'challenge_4',
        'user_id',
    ];


    /**
     * Set up relation with the user model
    **/
    public function user() {
        return $this->belongsTo('\App\Models\User', 'user_id');
    }
}
