<?php

namespace App\Http\Controllers;

use App\Models\Week;

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
    public function store()
    {
        $this->validateWeek();

        Week::create(request(['title', 'description', 'week_number', 'maximum_points']));

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
    public function update($id)
    {
        $week = Week::findOrFail($id);

        $this->validateWeek();

        $week->update(request(['title', 'description', 'week_number', 'maximum_points']));

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
    private function validateWeek() {
        return $this->validate(request(), [
            'title' => 'string|max:255',
            'description' => 'required|string',
            'week_number' => 'bail|required|integer',
            'maximum_points' => 'integer',
        ]);
    }
}
