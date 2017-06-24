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
}