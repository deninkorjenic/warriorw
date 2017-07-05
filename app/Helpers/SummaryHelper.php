<?php
namespace App\Helpers;

use App\Models\UserProgram;
use Carbon\Carbon;

class SummaryHelper
{
    public static function createCalendar()
    {
        /**
         * Set up the calendar on home
        **/
        $calendar = array();
        $firstday = Carbon::parse(auth()->user()->program_start);

        // We get program_json form user_programs table, this is already initialised and full program
        $program = UserProgram::where('user_id', auth()->user()->id)->first();
        $weeks = json_decode($program->program_json)->weeks;

        $n = 0;
        for($i = 0; $i <= count($weeks); $i++ ) {
            $days = array();
            for($j=1; $j<=7; $j++) {
                // TODO switch those two lines, used only for DEMO purpose
                $calendarDate = Carbon::parse(auth()->user()->program_start)->addDays($n-35);
                //$calendarDate = Carbon::parse(auth()->user()->program_start)->addDays($n);
                if($calendarDate->isPast()) {
                    $past = 1;
                } else {
                    $past = 0;
                }
                $day = array(
                        $calendarDate->format('j.M'),
                        $past
                    );
                array_push($days, $day );
                $n++;
            }
            array_push($calendar, $days);
        }

        return $calendar;
    }
}