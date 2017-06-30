<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Week;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

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

        return view('tasks.edit', ['task' => $task, 'weeks' => $weeks]);
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
}
