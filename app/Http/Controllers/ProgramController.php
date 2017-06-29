<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Helpers\FoodDiaryHelper;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::all();

        return view('programs.index', ['programs' => $programs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $weeks = Week::all();
        if(count($weeks) <= 0) {
            $request->session()->flash('message', 'Please first create some weeks before you can create tasks.');
            return redirect('/weeks');
        }
        return view('tasks.create', ['weeks' => $weeks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(\request(), [
            'description' => 'required|string',
            'points' => 'required|integer',
            'related_weeks' => 'required',
        ]);

        $task = Task::create(request(['description', 'points']));
        $task->weeks()->attach(request('related_weeks'));
        session()->flash('message', 'Task successfully created');

        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $weeks = Week::all();

        return view('tasks.edit', ['task' => $task, 'weeks' => $weeks, 'week_number' => '1']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $task = Task::findOrFail($id);

        $this->validate(request(), [
            'description' => 'required|string',
            'points' => 'integer',
            'related_weeks' => 'required'
        ]);

        $relatedWeeks = Input::get('related_weeks');

        $task->weeks()->sync(array_values($relatedWeeks));
        $task->update(request(['description', 'points']));

        session()->flash('message', 'Task successfully updated.');

        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        session()->flash('message', 'Task succesfully deleted.');
    }


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