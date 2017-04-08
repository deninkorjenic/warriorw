@extends('layouts.app');

@section('content')
    <h2>Edit Task</h2>

    <div class="row">
        <form class="col s12" method="POST" action="{{  url('/tasks') . '/' . $task->id }}">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="description" name="description" class="materialize-textarea" required> {{ $task->description }} </textarea>
                    <label for="description">Description</label>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="input-field">
                        <input id="points" name="points" type="number" class="validate" value="{{ $task->points }}" required>
                        <label for="points" data-error="wrong" data-success="right">Points</label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input id="week_number" name="week_number" type="number" class="validate" value="{{ $week_number }}" required>
                        <label for="week_number" data-error="wrong" data-success="right">Belongs to Week number:</label>
                    </div>
                </div>
            </div>

            <input type="submit" class="btn">
        </form>
    </div>
@endsection
