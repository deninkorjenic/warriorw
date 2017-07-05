<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Models\Week;
use App\Models\Education;
use App\Models\UserProgram;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = Education::all();

        return view('educations.index', ['educations' => $educations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $weeks = Week::all();
        if(count($weeks) <= 0) {
            request()->session()->flash('message', 'Please first create some weeks before you can create educations.');
            return redirect('/weeks');
        }
        return view('educations.create', ['weeks' => $weeks]);
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
            'video_url' => 'required|url',
        ]);

        $education = Education::create(request(['description', 'points', 'video_url']));
        $education->weeks()->attach(request('related_weeks'));
        // We need to add points to each related week
        foreach($education->weeks as $week) {
            $week->maximum_points += request()->points;
            $week->save();
        }
        session()->flash('message', 'Education successfully created');

        return redirect('/educations');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $education = Education::findOrFail($id);

        return view('educations.show', ['education' => $education]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $education = Education::findOrFail($id);
        $weeks = Week::all();

        return view('educations.edit', ['education' => $education, 'weeks' => $weeks]);
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
        $education = Education::findOrFail($id);

        $this->validate(request(), [
            'description' => 'required|string',
            'points' => 'integer',
            'related_weeks' => 'required',
            'video_url' => 'required|url',
        ]);

        $relatedWeeks = Input::get('related_weeks');

        $education->weeks()->sync(array_values($relatedWeeks));
        $education->weeks()->syncWithoutDetaching(array_values($relatedWeeks));
        // We need to add points to each related week
        foreach($education->weeks as $week) {
            $week->maximum_points -= $education->points;
            $week->maximum_points += request()->points;
            $week->save();
        }
        $education->update(request(['description', 'points', 'video_url']));

        session()->flash('message', 'Education successfully updated.');

        return redirect('/educations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education = Education::findOrFail($id);
        // We need to remove points from related weeks
        foreach($education->weeks as $week) {
            $week->maximum_points -= $education->points;
            $week->save();
        }
        $education->delete();
        session()->flash('message', 'Education succesfully deleted.');
    }

    /**
     * Method used to update education and give points to user
     */
    public function updateEducationStatus()
    {
        $user_program = UserProgram::where('user_id', auth()->user()->id)->first();

        $program_json = json_decode($user_program->program_json);

        $weeks = $program_json->weeks;
        foreach($weeks as $weekKey => $week) {
            if($week->id == request()->week_id) {
                $educations = $week->education;
                foreach(request()->education_ids as $education_id) {
                    foreach ($educations as $educationKey => $education) {
                        if($education->id == $education_id) {
                            if(!$education->watched) {
                                $user_program->total_score = (int) $user_program->total_score + (int) $education->points;
                                
                                $program_json->weeks[$weekKey]->education[$educationKey]->watched = true;
                                
                                $user_program->program_json = json_encode($program_json);
                                
                                $user_program->save();
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
