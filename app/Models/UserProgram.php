<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use Carbon\Carbon;

class UserProgram extends Model
{

    protected $fillable = [
        'user_id',
        'program_json',
    ];
    
    public static function getCurrentWeek($userId = false) {
        if($userId) {
            $program_start = Carbon::parse(User::find($userId)->program_start);
        } else {
            $program_start = Carbon::parse(auth()->user()->program_start);
        }

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

    public static function getOverallPointsAvailable()
    {
        $current_week = self::getCurrentWeek();

        $program = self::where('user_id', auth()->user()->id)->first();

        $program_json = json_decode($program->program_json);

        $points = 0;

        $related_weeks = explode(', ', $program_json->related_weeks);
        // If current week is not first week, we need to get points for each week before current
        if((int) $current_week != 0) {
            $counter = 0;
            for($counter; $counter < (int) $current_week; $counter++) {
                foreach($program_json->weeks as $week) {
                    if($week->id == $related_weeks[$counter]) {
                        $points += $week->maximum_points;
                    }
                }
            }
        } else {
            foreach($program_json->weeks as $week) {
                if($week->id == $related_weeks[0]) {
                    $points += $week->maximum_points;
                }
            }
        }
        return $points;
    }

    public static function getCurrentPoints()
    {
        $program = self::where('user_id', auth()->user()->id)->first();

        return (int) $program->total_score;
    }

    public static function getUsersProgram($userId)
    {
        
    }
}
