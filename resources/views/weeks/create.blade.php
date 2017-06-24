@extends('layouts.app');

@section('content')
    <h2>Create new Week</h2>

    <div class="row">
        <form class="col s12" method="POST" action="/weeks">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s12">
                    <input id="title" name="title" type="text" class="validate">
                    <label for="title">Title</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="description" name="description" class="materialize-textarea" required></textarea>
                    <label for="description">Description</label>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="input-field">
                        <input id="week_number" name="week_number" type="number" class="validate" required>
                        <label for="week_number" data-error="wrong" data-success="right">Week Number</label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input id="maximum_points" name="maximum_points" type="number" class="validate" required>
                        <label for="maximum_points" data-error="wrong" data-success="right">Maximum Points</label>
                    </div>
                </div>
            </div>

            <input type="submit" class="btn">
        </form>
    </div>
@endsection