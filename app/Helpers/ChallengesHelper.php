<?php
namespace App\Helpers;

use App\Models\Challenges;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChallengesHelper
{
    public static function areChallengesSetUp()
    {
        $data = [];
        $data['challenge_infos'] = self::getChallengesFromConfig();
        $data['habits'] = self::getHabitsFromConfig();

        $user_challenge = Challenges::find(auth()->user()->program_id);
        if(!$user_challenge['challenges_set_up']) {
            return view('challenges.setup', $data);
        } else {
            /**
             * We fiddle around with the dates for the challenges,
             * format them into Carbon, add a status variable if
             * the current date is between the start and end date
             * of a challenge.
            **/
            $c1 = json_decode($user_challenge->challenge_1);
            $c1->start->date = Carbon::parse($c1->start->date);
            $c1->end->date = Carbon::parse($c1->end->date);

            if (Carbon::now()->between($c1->start->date, $c1->end->date)) {
                $c1->status = 1;
            } else {
                $c1->status = 0;
            }


            $c2 = json_decode($user_challenge->challenge_2);
            $c2->start->date = Carbon::parse($c2->start->date);
            $c2->end->date = Carbon::parse($c2->end->date);

            if (Carbon::now()->between($c2->start->date, $c2->end->date)) {
                $c2->status = 1;
            } else {
                $c2->status = 0;
            }

            $data['c1'] = $c1;
            $data['c2'] = $c2;
            $data['c3'] = config('challenges.c3.challenges');

            return view('challenges.index', $data);
        }
    }

    private static function getChallengesFromConfig()
    {
        return [
            config('challenges.c1.challenges'),
            config('challenges.c2.challenges'),
            config('challenges.c3.challenges'),
            config('challenges.c4.challenges'),
        ];
    }

    private static function getHabitsFromConfig()
    {
        return [
            config('challenges.c3.habits'),
            config('challenges.c4.habits'),
        ];
    }

    public static function setUpChallenges(Request $request)
    {
        $program_start = Carbon::parse(auth()->user()->program_start);
        $user_challenge = Challenges::find(auth()->user()->program_id);

        /**
         *
         * First challenge
         *
        **/
        $c1 = array(
            'start'         => clone $program_start,
            'end'           => clone $program_start,
            'duration'      => 3,
            'points'        => 0,
            'challenges'    => [
                $request->c1_a1,
                $request->c1_a2,
                $request->c1_a3,
                $request->c1_a4,
                $request->c1_a5

            ],
            'days'          => NULL,
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
            'start'         => clone $c1['end'],
            'end'           => clone $c1['end'],
            'duration'      => 4,
            'points'        => 0,
            'challenges'    => [
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

        return true;
    }
}