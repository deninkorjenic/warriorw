@extends('layouts.app');

@section('content')
    <h2>Edit Education</h2>

    <div class="row">
        <form class="col s12" method="POST" action="{{  url('/educations') . '/' . $education->id }}">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="description" name="description" class="materialize-textarea" required> {{ $education->description }} </textarea>
                    <label for="description">Description</label>
                    @if ($errors->has('descritpion'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" id="video_url" name="video_url" value="{{ $education->video_url }}"required></input>
                    <label for="video_url">Video URL</label>
                    @if ($errors->has('video_url'))
                        <span class="help-block">
                            <strong>{{ $errors->first('video_url') }}</strong>
                        </span>
                    @endif
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
                                    @if ($week->isRelatedToEducation($education->id))
                                        checked="checked"
                                    @endif
                            />
                            <label for="week-{{$week->id}}">{{ 'Week ' . $week->week_number }}</label>
                        </li>
                        @endforeach
                            @if ($errors->has('related_weeks'))
                            <span class="help-block">
                                <strong>{{ $errors->first('related_weeks') }}</strong>
                            </span>
                        @endif
                    </ul>
                </div>
                <div class="col s4">
                    <div class="input-field">
                        <input id="points" name="points" type="number" class="validate" value="{{ $education->points }}" required>
                        <label for="points" data-error="wrong" data-success="right">Points</label>
                        @if ($errors->has('points'))
                            <span class="help-block">
                                <strong>{{ $errors->first('points') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <input type="submit" class="btn">
        </form>
    </div>
@endsection
