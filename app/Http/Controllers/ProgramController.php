<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Helpers\FoodDiaryHelper;

class ProgramController extends Controller
{
    public function getWeek($number) {

    	$program = Program::where('user_id', auth()->user()->id)->first()->getAttributes();
    	$week = json_decode($program['week_' . $number]);

    	$current_week_start = Carbon::parse(auth()->user()->program_start)->addWeek($number);

    	if($current_week_start->isPast()) {
    		$webinars = [0,0];
    	} else {
	    	$current_week_start->addDay(2);
	    	if ($current_week_start->isPast()) {
	    		$webinars = [1,1];
	    	} else {
	    		$webinars = [1,0];
	    	}
    	}
	    
	    return view('weeks.week', ['week' => $week, 'webinars' => $webinars, 'number' => $number]);

    }


    public function getQuiz($number) {

    	$program = Program::where('user_id', auth()->user()->id)->first()->getAttributes();
    	$week = json_decode($program['week_' . $number]);
    	$rq = json_decode($program['rq_' . $number]);
    	return view('weeks.quiz', [
    			'week' => $week,
    			'quiz' => $rq,
                'number' => $number
    		]);
    }

    public function getFoodDiary()
    {
        /**
         * We need to get food diary from database
         */
        $food_diary = FoodDiaryHelper::read();
        
        return view('weeks.food-diary', ['food_diary' => $food_diary]);
    }

    public function updateFoodDiary(Request $request)
    {
        FoodDiaryHelper::update($request);
    }
}