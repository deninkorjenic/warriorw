<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Models\Training;
use App\Models\Week;
use App\Models\UserProgram;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $training = Training::all();

        return view('trainings.index', ['trainings' => $training]);
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
            $request->session()->flash('message', 'Please first create some weeks before you can create trainings.');
            return redirect('/weeks');
        }
        return view('trainings.create', ['weeks' => $weeks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(\request(), [
            'description' => 'required|string',
            'points' => 'required|integer',
            'related_weeks' => 'required',
        ]);

        $training = Training::create(request(['description', 'points']));
        $training->weeks()->attach(request('related_weeks'));
        // We need to add points to each related week
        foreach($training->weeks as $week) {
            $week->maximum_points += request()->points;
            $week->save();
        }
        session()->flash('message', 'Training successfully created');

        return redirect('/trainings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $training = Training::findOrFail($id);

        return view('trainings.show', ['training' => $training]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $training = Training::findOrFail($id);
        $weeks = Week::all();

        return view('trainings.edit', ['training' => $training, 'weeks' => $weeks]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $training = Training::findOrFail($id);

        $this->validate(request(), [
            'description' => 'required|string',
            'points' => 'integer',
            'related_weeks' => 'required'
        ]);

        $relatedWeeks = Input::get('related_weeks');

        $training->weeks()->sync(array_values($relatedWeeks));
        $training->weeks()->syncWithoutDetaching(array_values($relatedWeeks));
        // We need to add points to each related week
        foreach($training->weeks as $week) {
            $week->maximum_points -= $training->points;
            $week->maximum_points += request()->points;
            $week->save();
        }
        $training->update(request(['description', 'points']));

        session()->flash('message', 'Training successfully updated.');

        return redirect('/trainings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training = Training::findOrFail($id);
        // We need to remove points from related weeks
        foreach($training->weeks as $week) {
            $week->maximum_points -= $training->points;
            $week->save();
        }
        $training->delete();
        session()->flash('message', 'Training succesfully deleted.');
    }

    /**
     * Method used to update training and give points to user
     */
    public function updateTrainingStatus()
    {
        $user_program = UserProgram::where('user_id', auth()->user()->id)->first();

        $program_json = json_decode($user_program->program_json);

        $weeks = $program_json->weeks;
        foreach($weeks as $weekKey => $week) {
            if($week->id == request()->week_id) {
                $trainings = $week->trainings;
                foreach(request()->training_ids as $training_id) {
                    foreach ($trainings as $trainingKey => $training) {
                        if($training->id == $training_id) {
                            if(!$training->completed) {
                                $user_program->total_score = (int) $user_program->total_score + (int) $training->points;
                                
                                $program_json->weeks[$weekKey]->trainings[$trainingKey]->completed = true;
                                
                                $user_program->program_json = json_encode($program_json);
                                
                                $user_program->update();
                            } else {
                                return redirect('/home');
                            }
                        }
                    }
                }
            }
        }
    }
}
