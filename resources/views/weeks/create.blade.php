@extends('layouts.app');

@section('content')
    <h2>Create new Week</h2>

    <div class="row">
        <form class="col s12" method="POST" action="{{ url('/weeks') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s12">
                    <label for="title">Title</label>
                    <input id="title" name="title" type="text" class="validate" required value="{{ old('title') }}">
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="description" name="description" class="materialize-textarea" required value="{{ old('description') }}">{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                    <label for="description">Description</label>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="input-field">
                        <input id="week_number" name="week_number" type="number" class="validate" required value="{{ old('week_number') }}">
                        @if ($errors->has('week_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('week_number') }}</strong>
                            </span>
                        @endif
                        <label for="week_number" data-error="wrong" data-success="right">Week Number</label>
                    </div>
                </div>
            </div>

            <input type="submit" class="btn">
        </form>
    </div>
@endsection