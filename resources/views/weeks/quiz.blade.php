@extends('layouts.profile')

@section('content')
<div class="row">
  <div class="col s12">
    <h4 class="update-quiz-url" data-url="{{ url('/update-quiz') }}" data-week-id="{{ $week->id }}">Revision quiz {{ $week->week_number }}
    @foreach($quizes as $quiz)
      @if($quiz->completed)
        <span class="quiz-completed" style="color:green;">Completed!!!</span>
        @break
      @endif
    @endforeach
    </h4>
    <div class="card">
      <div class="card-content">
        <span class="card-title">
        </span>

        @foreach($quizes as $quiz)
          @include('weeks.subviews.quiz')
        @endforeach
  
      </div>
      <div class="card-action right-align">
        <a class="waves-effect waves-teal btn-flat" onclick="updateQuizStatus();">Update</a>
      </div>
    </div>

  </div>
 </div> 
@endsection