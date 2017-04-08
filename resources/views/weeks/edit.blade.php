@extends('layouts.app');

@section('content')
    <h2>Edit Week</h2>
    <hr>
    <br>

    <div class="row">
        <form class="col s12" method="POST" action="{{ url('/weeks') .'/' . $week->id }}">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
            <div class="row">
                <div class="input-field col s12">
                    <input id="title" name="title" type="text" class="validate" value="{{ $week->title }}" required>
                    <label for="title">Title</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="description" name="description" class="materialize-textarea" required> {{ $week->description }} </textarea>
                    <label for="description">Description</label>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="input-field">
                        <input id="week_number" name="week_number" type="number" class="validate" value="{{ $week->week_number }}" required>
                        <label for="week_number" data-error="wrong" data-success="right">Week Number</label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input id="maximum_points" name="maximum_points" type="number" class="validate" value="{{ $week->maximum_points }}" required>
                        <label for="maximum_points" data-error="wrong" data-success="right">Maximum Points</label>
                    </div>
                </div>
            </div>

            <input type="submit" class="btn">
        </form>
        @include('errors.errors')
    </div>
@endsection