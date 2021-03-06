<?php

namespace App\Http\Controllers;

use App\Models\Week;
use Illuminate\Http\Request;
use Validator;

class WeekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weeks = Week::all();

        return view('weeks.index', ['weeks' => $weeks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('weeks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validateWeek($request);
        
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $week = new Week;
        $newData = $this->setNewWeekData($week);
        $newData->save();

        session()->flash('message', 'Week successfully created!');

        return redirect('/weeks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $week = Week::findOrFail($id);

        return view('weeks.show', ['week' => $week]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $week = Week::findOrFail($id);

        return view('weeks.edit', ['week' => $week]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $week = Week::findOrFail($id);

        $validator = $this->validateWeek($request);
        
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $newData = $this->setNewWeekData($week);
        $newData->save();

        session()->flash('message', 'Week successfully updated!');

        return redirect('/weeks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $week = Week::findOrFail($id);
        $week->delete();
    }

    /**
     *  Validation rules for create and update
     */
    private function validateWeek(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'week_number' => 'bail|required|integer',
        ]);

        return $validator;
    }

    /**
     * Method used to set new week data on update/create
     */
    public function setNewWeekData($week) {
        $week->title = request()->title;
        $week->description = request()->description;
        $week->week_number = request()->week_number;
        $week->maximum_points = $week->calculateMaxPoints();

        return $week;
    }
}
