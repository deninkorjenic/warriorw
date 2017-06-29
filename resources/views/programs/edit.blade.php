@extends('layouts.app');

@section('content')
    <h2>Edit Program</h2>

    <div class="row">
        <form class="col s12" method="POST" action="{{ url('/programs') . '/' . $program->id  }}">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
            <div class="row">
                <div class="input-field col s12">
                    <label for="title">Title</label>
                    <input id="title" name="title" type="text" class="validate" required value="{{ $program->title }}">
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="description" name="description" class="materialize-textarea" 
                              required value="{{ $program->description }}">{{ $program->description}}
                    </textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                    <label for="description">Description</label>
                </div>
            </div>
            <h2>Select Weeks for Program</h2>
            <table class="striped">
                <thead>
                    <tr>
                        <th>Week Title</th>
                        <th>Week Number</th>
                        <th>Total Points</th>
                        <th>Add to Program</th>
                    </tr>
                </thead>

                <tbody>
                    @if (isset($weeks))
                        @foreach($weeks as $week)
                            <tr>
                                <td><a href="{{ url('/weeks/') . '/' . $week->id }}">{{ $week->title }}</a></td>
                                <td>{{ $week->week_number }}</td>
                                <td>{{ $week->maximum_points }}</td>
                                <td><input
                                        type="checkbox"
                                        id="week-{{$week->id}}"
                                        name="related_weeks[]"
                                        value="{{$week->id}}"
                                        @if ($week->isRelatedToProgram($program->id))
                                            checked="checked"
                                        @endif
                                    />
                                    <label for="week-{{$week->id}}">{{ 'Week ' . $week->week_number }}</label>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            @if ($errors->has('related_weeks'))
                <span class="help-block">
                    <strong>{{ $errors->first('related_weeks') }}</strong>
                </span>
            @endif
            <input type="submit" class="btn">
        </form>
    </div>
@endsection