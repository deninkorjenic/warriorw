@extends('layouts.app');

@section('content')
    <h2>Create new Quiz</h2>

    <div class="row">
        <form class="col s12" method="POST" action="{{ url('/quizes') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" id="question" name="question" required></input>
                    <label for="question">Question</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" id="answer" name="answer[]" required></input>
                    <label for="answer">Answer</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <a class="waves-effect waves-light btn-large add-answer">Add Answer</a>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" id="correct_answer" name="correct_answer" required></input>
                    <label for="correct_answer">Correct Answer</label>
                </div>
            </div>
            <div class="row">
                <div class="col s8">
                    <h4>Belongs to Week: </h4>

                    <ul>
                        @foreach($weeks as $week)
                            <li>
                                <input
                                        type="radio"
                                        id="week-{{$week->id}}"
                                        name="related_week"
                                        value="{{$week->id}}"
                                />
                                <label for="week-{{$week->id}}">{!! $week->title !!}</label>
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