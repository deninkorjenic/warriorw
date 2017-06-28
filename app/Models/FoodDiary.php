<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class FoodDiary extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'day_1', 
        'day_2', 
        'day_3', 
        'day_4',
    ];

    protected $casts = [
        'day_1' => 'json',
        'day_2' => 'json',
        'day_3' => 'json',
        'day_4' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
