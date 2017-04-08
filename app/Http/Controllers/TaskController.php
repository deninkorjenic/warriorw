<?php

namespace App\Http\Controllers;

use App\Task;
use App\Week;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
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
            'points' => 'integer'
        ]);

        Task::create(request(['description', 'points']));

        session()->flash('message', 'Task successfully created');

        return redirect('/home');

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
        // TODO: Use many to many relationship and get all weeks
        $weeksCollection = $task->weeks;
        $week = $weeksCollection->first();

//        $week = $weeks->first();

        return view('tasks.edit', ['task' => $task, 'week_number' => $week->week_number]);
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
            'points' => 'integer'
        ]);

        $weeks = Week::where('week_number', request('week_number'))->get();
        $task->weeks()->attach($weeks->first()->id);
        $task->update(request(['description', 'points']));

        session()->flash('message', 'Tasks successfully updated');

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
    }
}
