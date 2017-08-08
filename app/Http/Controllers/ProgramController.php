<?php
namespace App\Http\Controllers;

use App\Models\Week;
use App\Models\Program;
use App\Models\UserProgram;
use Illuminate\Http\Request;
use App\Helpers\FoodDiaryHelper;

class ProgramController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $weeks = Week::all();

        if (count($weeks) <= 0) {
            $request->session()->flash('message', 'Please first create some weeks before you can create program.');

            return redirect('/weeks');
        }

        return view('programs.create', ['weeks' => $weeks]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();
        session()->flash('message', 'Program succesfully deleted.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program = Program::findOrFail($id);
        $weeks   = Week::all();

        return view('programs.edit', ['program' => $program, 'weeks' => $weeks]);
    }

    public function getFoodDiary()
    {
        /**
         * We need to get food diary from database
         */
        $food_diary = FoodDiaryHelper::read();

        return view('weeks.food-diary', ['food_diary' => $food_diary]);
    }

    /**
     * @param $number
     */
    public function getQuiz($number)
    {

        $program = UserProgram::where('user_id', auth()->user()->id)->first();
        $week    = '';

        foreach (json_decode($program->program_json)->weeks as $w) {

            if ($w->id == $number) {
                $week = $w;
            }

        }

        $quizes = $week->quizes;

        return view('weeks.quiz', ['week' => $week, 'quizes' => $quizes]);
    }

    /**
     * @param $weekId
     */
    public function getWeek($weekId)
    {

        $program = UserProgram::where('user_id', auth()->user()->id)->first();
        $week    = '';
        $preWeek = false;

        foreach (json_decode($program->program_json)->weeks as $w) {

            if ($w->id == $weekId) {
                $week = $w;
            }

        }

        /** We need to determine if this is pre-start week, week 0
         *  we get first value from related_weeks in program, if it's same as $weekId it is
         */

        if (json_decode($program->program_json)->related_weeks[0] == $week->id) {

            $preWeek = true;
        }

        return view('weeks.week', ['week' => $week, 'preWeek' => $preWeek]);

    }

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
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::findOrFail($id);

        return view('programs.show', ['program' => $program]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'related_w'   => 'required|string',
        ]);

        $relatedWeeks = explode(', ', request()->input('related_w'));

        $program                = new Program();
        $program->title         = request()->title;
        $program->description   = request()->description;
        $program->related_weeks = request()->related_w;
        $program->save();

        $program->weeks()->attach(array_values($relatedWeeks));

        session()->flash('message', 'Program successfully created');

        return redirect('/programs');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);

        $this->validate(request(), [
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'related_w'   => 'required|string',
        ]);

        $relatedWeeks = explode(', ', request()->input('related_w'));

        $program->weeks()->sync(array_values($relatedWeeks));
        $program->weeks()->syncWithoutDetaching(array_values($relatedWeeks));

        $program->update(['title' => $request->title, 'description' => $request->description, 'related_weeks' => $request->related_w]);

        session()->flash('message', 'Program successfully updated.');

        return redirect('/programs');
    }

    /**
     * @param Request $request
     */
    public function updateFoodDiary(Request $request)
    {
        FoodDiaryHelper::update($request);
    }

}
