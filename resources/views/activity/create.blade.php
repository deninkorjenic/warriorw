@extends('layouts.app');

@section('content')
    <h2>Create new Activity</h2>

    <div class="row">
        <form class="col s12" method="POST" action="{{ url('/activities') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s12">
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" class="validate" required value="{{ old('title') }}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" id="value" name="value" class="validate" required value="{{ old('value') }}">
                    @if ($errors->has('value'))
                        <span class="help-block">
                            <strong>{{ $errors->first('value') }}</strong>
                        </span>
                    @endif
                    <label for="value">Value</label>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="input-field">
                        <input id="points" name="points" type="number" class="validate" required value="{{ old('points') }}">
                        @if ($errors->has('points'))
                            <span class="help-block">
                                <strong>{{ $errors->first('points') }}</strong>
                            </span>
                        @endif
                        <label for="points" data-error="wrong" data-success="right">Points</label>
                    </div>
                </div>
            </div>

            <input type="submit" class="btn">
        </form>
    </div>
@endsection