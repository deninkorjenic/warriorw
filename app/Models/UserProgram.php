<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UserProgram extends Model
{

    protected $fillable = [
        'user_id',
        'program_json',
    ];
    
    public static function getCurrentWeek() {
        $program_start = Carbon::parse(auth()->user()->program_start);

        $today = $program_start->diffInDays($program_start->copy()->addDay(16));
        // $today = $program_start->diffInDays(Carbon::now());

        $current_week = $today/7;
        if (($current_week - (int)$current_week) != 0  && ($current_week - (int)$current_week) > 1) {
            $current_week = (int)$current_week + 1;
        } else if ($current_week < 1) {
            $current_week = 0;
        }
        return $current_week;
    }

    public static function getUsersProgram($userId)
    {
        
    }
}
