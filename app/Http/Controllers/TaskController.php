<?php

namespace App\Http\Controllers;

use App\Task;
use App\Week;
use Illuminate\Support\Facades\Input;

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
        $weeks = Week::all();
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
            'points' => 'integer'
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
            'points' => 'integer'
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
}
