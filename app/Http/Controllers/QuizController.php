<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Week;
use App\Models\UserProgram;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizes = Quiz::all();

        return view('quizes.index', ['quizes' => $quizes]);
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
            request()->session()->flash('message', 'Please first create some weeks before you can create quiz.');
            return redirect('/weeks');
        }
        return view('quizes.create', ['weeks' => $weeks]);
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
            'question' => 'required|string',
            'answer' => 'required',
            'correct_answer' => 'required|string',
            'points' => 'required|integer',
            'related_week' => 'required',
        ]);

        $quiz = new Quiz;
        $quiz->week_id = $request->related_week;
        $quiz->question = $request->question;
        $quiz->answers = $request->answer;
        $quiz->correct_answer = $request->correct_answer;
        $quiz->points = (int) $request->points;
        $quiz->save();

        $week = Week::find($request->related_week);
        $week->maximum_points += (int) $request->points;
        $week->save();
        
        session()->flash('message', 'Quiz successfully created');

        return redirect('/quizes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = Quiz::findOrFail($id);

        return view('quizes.show', ['quiz' => $quiz]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);
        $weeks = Week::all();

        return view('quizes.edit', ['quiz' => $quiz, 'weeks' => $weeks]);
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
        $quiz = Quiz::findOrFail($id);

        $this->validate(request(), [
            'question' => 'required|string',
            'answer' => 'required',
            'correct_answer' => 'required|string',
            'points' => 'required|integer',
            'related_week' => 'required',
        ]);

        // We need to remove old points from related week
        $oldWeek = Week::find($quiz->week_id)->first();
        $oldWeek->maximum_points -= $quiz->points;
        $oldWeek->update();

        $quiz->week_id = $request->related_week;
        $quiz->question = $request->question;
        $quiz->answers = $request->answer;
        $quiz->correct_answer = $request->correct_answer;
        $quiz->points = (int) $request->points;
        $quiz->update();

        $week = Week::find($request->related_week);
        $week->maximum_points += (int) $request->points;
        $week->save();

        session()->flash('message', 'Quiz successfully updated.');

        return redirect('/quizes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // TODO: Maybe we will need to modify this to update weeks table
        $quiz = Quiz::findOrFail($id);
        // We need to remove points from related week
        $week = Week::find($quiz->week_id);
        $week->maximum_points -= (int) $quiz->points;
        $week->save();
        
        $quiz->delete();
        session()->flash('message', 'Quiz succesfully deleted.');
    }

    /**
     * Method used to update quiz and give points to user
     */
    public function updateQuizStatus()
    {
        $program = UserProgram::where('user_id', auth()->user()->id)->first();
        $program_json = json_decode($program->program_json);

        // We need to list all weeks 'till we find requested one
        foreach($program_json->weeks as $weekKey => $week) {
            if($week->id == request()->week_id) {
                // Now we need to list all quizes, comapre them with user answers and calculate response
                foreach($week->quizes as $quizKey => $quiz) {
                    foreach(request()->quizes as $requestQuiz) {
                        if($quiz->id == $requestQuiz['id']) {
                            if(!$quiz->completed){
                                if($quiz->correct_answer != $requestQuiz['answer']) {
                                    echo json_encode(['error' => [
                                        'id'        => $requestQuiz['id'],
                                        'message'   => "Incorrect answer.",
                                    ]]);
                                    break 3;
                                }
                            } else {
                                echo json_encode(['error' => [
                                    'id'        => $requestQuiz['id'],
                                    'message'   => "Quiz already answered.",
                                ]]);
                                break 3;
                            }
                        } else{
                            continue;
                        }
                    }
                }
                // We must repeat this beause we can't start to add score if not all answers correct
                foreach($week->quizes as $quizKey => $quiz) {
                    foreach(request()->quizes as $requestQuizKey => $requestQuiz) {
                        $program_json->weeks[$weekKey]->quizes[$quizKey]->completed = true;
                        
                        $program->total_score += $quiz->points;
                    };
                    $program->program_json = json_encode($program_json);
                    $program->update();
                }
                echo json_encode(['success' => url('/home')]);
            }

        }
    }
}