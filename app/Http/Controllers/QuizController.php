<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Week;

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
            $request->session()->flash('message', 'Please first create some weeks before you can create quiz.');
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
        $quiz->points = $request->points;
        $quiz->save();
        
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

        $relatedWeek = $request->related_week;

        $quiz->week_id = $request->related_week;
        $quiz->question = $request->question;
        $quiz->answers = $request->answer;
        $quiz->correct_answer = $request->correct_answer;
        $quiz->points = $request->points;
        $quiz->update();

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
        $quiz->delete();
        session()->flash('message', 'Quiz succesfully deleted.');
    }
}
