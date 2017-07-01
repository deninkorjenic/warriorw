<?php

namespace App\Http\Controllers;

use App\Models\UserProgram;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Helpers\FoodDiaryHelper;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show profile summary
    **/
    public function showSummary() {
        // If user is admin we redirect him to admin section
        if(auth()->user()->role === 'admin') {
            return redirect('/programs');
        }
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

        $related_weeks = explode(',', json_decode($program->program_json)->related_weeks);

        $data = array(
                'created_at'        => auth()->user()->created_at,
                'program_start'     => Carbon::parse(auth()->user()->program_start),
                'week_one'          => Carbon::parse(auth()->user()->week_one),
                'last_day'          => Carbon::parse(auth()->user()->last_day),
                'calendar'          => $calendar,

                'current_week'      => UserProgram::getCurrentWeek(),
                'goals'             => json_decode(auth()->user()->goals),
                'program_json'      => json_decode($program->program_json),
                'overall_points'    => UserProgram::getOverallPointsAvailable(),
                'related_weeks'     => $related_weeks,
            );

        return view('summary.index', ['data' => $data]);
    }

    /**
     * Update goals from the homepage
    **/
    public function updateGoals(Request $request) {
        $goals = array(
                $request->goal_1,
                $request->goal_2,
                $request->goal_3,
                $request->goal_4
            );
        $goals = json_encode($goals);
        auth()->user()->goals = $goals;
        auth()->user()->save();
        return redirect('/home');
    }
}
