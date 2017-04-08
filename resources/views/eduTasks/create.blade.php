@extends('layouts.app');

@section('content')
    <h2>Create new Tasks List</h2>

    <div class="row">
        <form class="col s12" method="POST" action="{{ url('/task-lists') }}">
            {{ csrf_field() }}

            <div class="input-field col s12">
                <select>
                    <option value="" disabled selected>Choose your option</option>
                    <option value="1">Education</option>
                    <option value="2">Tasks</option>
                    <option value="3">Training plan</option>
                </select>
                <label>Select week for this task list.</label>
            </div>

            <hr>

            <div class="input-field col s12">
                <select multiple>
                    <option value="education" selected>Education</option>
                    <option value="tasks">Tasks</option>
                    <option value="training-plan">Training plan</option>
                </select>
                <label>Select task list category.</label>
            </div>

            <div class="row js-education">
                <h3>Education</h3>
                <hr>

                <div class="input-field col s12">
                    <input id="description" name="description" type="text" class="validate">
                    <label for="description">Description</label>
                </div>

                <div class="col s6">
                    <div class="input-field">
                        <input id="video" name="video" type="string" class="validate">
                        <label for="video" data-error="wrong" data-success="right">Add video url</label>
                    </div>
                </div>

                <div class="col s6">
                    <div class="input-field">
                        <input id="points" name="points" type="number" class="validate">
                        <label for=points" data-error="wrong" data-success="right">Ammount of points</label>
                    </div>
                </div>
            </div>

            <div class="row js-tasks">
                <div class="col s6">
                    <h3>Tasks</h3>
                    <hr>

                    <div class="input-field">
                        <input id="description" name="description" type="string" class="validate">
                        <label for="description" data-error="wrong" data-success="right">Week Number</label>
                    </div>
                </div>

                <div class="col s6">
                    <div class="input-field">
                        <input id="maximum_points" name="maximum_points" type="number" class="validate" required>
                        <label for="maximum_points" data-error="wrong" data-success="right">Maximum Points</label>
                    </div>
                </div>
            </div>

            <div class="row js-training-plan">
                <div class="col s6">
                    <h3>Training Plan</h3>
                    <hr>

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