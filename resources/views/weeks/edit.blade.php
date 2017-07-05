@extends('layouts.app')

@section('content')
    <h2>Edit Week</h2>
    <hr>
    <br>

    <div class="row">
        <form class="col s12" method="POST" action="{{ url('/weeks') .'/' . $week->id }}">
            {{ csrf_field() }}
            <input type="hidden" name="week_number" value="{{ $week->week_number }}">
            <input name="_method" type="hidden" value="PATCH">
            <div class="row">
                <div class="input-field col s12">
                    <input id="title" name="title" type="text" class="validate" value="{{ $week->title }}" required>
                    <label for="title">Title</label>
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="description" name="description" class="materialize-textarea" required> {{ $week->description }} </textarea>
                    <label for="description">Description</label>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="input-field">
                        <input id="week_number" type="number" value="{{ $week->week_number }}" disabled>
                        <label for="week_number" data-error="wrong" data-success="right">Week Number</label>
                    </div>
                </div>
            </div>

            <input type="submit" class="btn">
        </form>
    </div>
@endsection