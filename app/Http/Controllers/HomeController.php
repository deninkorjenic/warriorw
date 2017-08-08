<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\UserProgram;
use Illuminate\Http\Request;
use App\Helpers\SummaryHelper;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'home' );
    }

    /**
     * Show profile summary
     *
     */
    public function showSummary()
    {

// If user is admin we redirect him to admin section
        if ( auth()->user()->role === 'admin' ) {
            return redirect( '/programs' );
        }

        $program       = UserProgram::where( 'user_id', auth()->user()->id )->first();
        $related_weeks = explode( ', ', json_decode( $program->program_json )->related_weeks );

        $data = [

            'created_at'     => auth()->user()->created_at,
            'program_start'  => Carbon::parse( auth()->user()->program_start ),
            'week_one'       => Carbon::parse( auth()->user()->week_one ),
            'last_day'       => Carbon::parse( auth()->user()->last_day ),
            'calendar'       => SummaryHelper::createCalendar(),

            'current_week'   => UserProgram::getCurrentWeek(),
            'goals'          => json_decode( auth()->user()->goals ),
            'program_json'   => json_decode( $program->program_json ),
            'overall_points' => UserProgram::getOverallPointsAvailable(),
            'related_weeks'  => $related_weeks,
            'current_points' => UserProgram::getCurrentPoints(),
            'adherence'      => $program->adherence,
        ];

        return view( 'summary.index', $data );
    }

    /**
     * Update goals from the homepage
     *
     */
    public function updateGoals( Request $request )
    {
        $goals = [
            $request->goal_1,
            $request->goal_2,
            $request->goal_3,
            $request->goal_4,
        ];
        $goals                = json_encode( $goals );
        auth()->user()->goals = $goals;
        auth()->user()->save();

        return redirect( '/home' );
    }

}
