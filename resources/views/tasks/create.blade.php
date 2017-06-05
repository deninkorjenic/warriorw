@extends('layouts.app');

@section('content')
    <h2>Create new Task</h2>

    <div class="row">
        <form class="col s12" method="POST" action="/tasks">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="description" name="description" class="materialize-textarea" required></textarea>
                    <label for="description">Description</label>
                </div>
            </div>
            <div class="row">
                <div class="col s8">
                    <h4>Belongs to Week: </h4>

                    <ul>
                        @foreach($weeks as $week)
                            <li>
                                <input
                                        type="checkbox"
                                        id="week-{{$week->id}}"
                                        name="related_weeks[]"
                                        value="{{$week->id}}"
                                />
                                <label for="week-{{$week->id}}">{{ 'Week ' . $week->week_number }}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col s4">
                    <div class="input-field">
                        <input id="points" name="points" type="number" class="validate" required>
                        <label for="points" data-error="wrong" data-success="right">Points</label>
                    </div>
                </div>
            </div>

            <input type="submit" class="btn">
        </form>
    </div>
@endsection