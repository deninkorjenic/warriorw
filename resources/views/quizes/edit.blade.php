@extends('layouts.app')

@section('content')
    <h2>Edit Quiz</h2>

    <div class="row">
        <form class="col s12" method="POST" action="{{  url('/quizes') . '/' . $quiz->id }}">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" id="question" name="question" required value="{{ $quiz->question }}"></input>
                    <label for="question">Question</label>
                    @if ($errors->has('question'))
                        <span class="help-block">
                            <strong>{{ $errors->first('question') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            @foreach($quiz->answers as $answer)
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="answer" name="answer[]" required value="{{ $answer }}"></input>
                        <label for="answer">Answer</label>
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col s12">
                    <a class="waves-effect waves-light btn-large add-answer">Add Answer</a>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" id="correct_answer" name="correct_answer" required value="{{ $quiz->correct_answer }}"></input>
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
                                    @if ($week->isRelatedToQuiz($week->id))
                                        checked="checked"
                                    @endif
                            />
                            <label for="week-{{$week->id}}">{!! $week->title !!}</label>
                        </li>
                        @endforeach
                            @if ($errors->has('related_week'))
                            <span class="help-block">
                                <strong>{{ $errors->first('related_week') }}</strong>
                            </span>
                        @endif
                    </ul>
                </div>
                <div class="col s4">
                    <div class="input-field">
                        <input id="points" name="points" type="number" class="validate" value="{{ $quiz->points }}" required>
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
