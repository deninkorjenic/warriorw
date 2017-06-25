<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        /**
         * Set up the calendar on home
        **/
        $calendar = array();
        $firstday = Carbon::parse(auth()->user()->program_start);

        $n = 0;
        for($i = 0; $i <= 15; $i++ ) {
            $days = array();
            for($j=1; $j<=7; $j++) {
                // TODO switch those two line, used only for DEMO purpose
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

        

        $data = array(
                'created_at'    => auth()->user()->created_at,
                'program_start' => Carbon::parse(auth()->user()->program_start),
                'week_one'      => Carbon::parse(auth()->user()->week_one),
                'last_day'      => Carbon::parse(auth()->user()->last_day),
                'calendar'      => $calendar,
                'current_week'  => Program::getCurrentWeek(),
                'goals'         => json_decode(auth()->user()->goals)
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
