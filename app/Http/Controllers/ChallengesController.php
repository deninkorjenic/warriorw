<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Challenges;
use App\Helpers\ChallengesHelper;

class ChallengesController extends Controller
{
    /**
     * Show the challenges summary
    **/
    public function index() {
        $view = ChallengesHelper::areChallengesSetUp();
        return $view;
    }

	/**
     * Set up the challenges for the user
    **/
    public function setUpChallenges(Request $request) {
    	$program_start = Carbon::parse(auth()->user()->program_start);
    	$user_challenge = Challenges::find(auth()->user()->program_id);
        var_dump($user_challenge);

    	/**
    	 *
    	 * First challenge
    	 *
    	**/
    	$c1 = array(
    		'start' 		=> clone $program_start,
    		'end' 			=> clone $program_start,
    		'duration' 		=> 3,
    		'points'		=> 0,
    		'challenges'	=> [
    			$request->c1_a1,
    			$request->c1_a2,
    			$request->c1_a3,
    			$request->c1_a4,
    			$request->c1_a5

    		],
    		'days'			=> NULL,
    		);
    	/**
    	 * Set up the end of the first challenge
    	**/
    	$c1['end']->day += ($c1['duration'] * 5);

    	/**
    	 * Set up an empty table to track challenge 1
    	**/
    	$c1_days = array();
    	for($i = 0; $i < $c1['duration']; $i++) {
    		array_push($c1_days, array());
    		for($j=0; $j<5; $j++) {
    			array_push($c1_days[$i], [0,0,0,0,0]);
    		}
    	}
    	$c1['days'] = $c1_days;

    	$user_challenge->challenge_1 = $c1;

    	/**
    	 *
    	 * Second challenge
    	 *
    	**/
    	$c2 = array(
    		'start' 		=> clone $c1['end'],
    		'end' 			=> clone $c1['end'],
    		'duration' 		=> 4,
    		'points'		=> 0,
    		'challenges'	=> [
    			$request->c2_a1,
    			$request->c2_a2,
    			$request->c2_a3,
    			$request->c2_a4,
    			$request->c2_a5
    		]
    		);
    	/**
    	 * Set up the end of the second challenge. We add 
    	 * a single day to start and end because a challenge
    	 * starts a day after the first one ends
    	**/
    	$c2['start']->day += 1;
    	$c2['end']->day += 1;

    	$c2['end']->day += ($c2['duration'] * 5);


    	$c1 = json_encode($c1);
    	$c2 = json_encode($c2);

    	$user_challenge->challenge_1 = $c1;
    	$user_challenge->challenge_2 = $c2;
    	$user_challenge->challenges_set_up = 1;
    	$user_challenge->save();

    	return redirect('/challenges');
    }
}
