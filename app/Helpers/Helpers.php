<?php
namespace App\Helpers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Activity;
use Illuminate\Support\ServiceProvider;

class Helpers extends ServiceProvider
{
    /**
     * Used to retrive activity points
     * 
     * @param $activity Activity value from FORM <select>
     *
     * @return int Activity points
     */
    public static function getActivityPoints($activity)
    {
        return Activity::where('value', $activity)->first()->points;
    }

    public static function getAllActivities()
    {
        return Activity::all();
    }

    /**
     * Used to check if program has finished
     *
     * @param  int $id User's id
     *
     * @return boolean Returns true or false, depend's if program is finished
     */
    public static function isProgramFinished($id = false)
    {

        if ($id) {
            return Carbon::parse(User::find($id)->last_day)->isPast();
        } else {
            return Carbon::parse(auth()->user()->last_day)->isPast();
        }

    }

}
