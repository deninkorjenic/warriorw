@extends('layouts.app');

@section('content')
    <h2>Quiz id: {{ $quiz->id }}</h2>
    <hr>

    <p>Question: <strong>{{ $quiz->question }}</strong></p>

    <hr>

    <p>Correct answer: <strong>{{ $quiz->correct_answer }}</strong></p>

    <hr>

    <a href="{{ url('/quizes') . '/' . $quiz->id . '/edit' }}" class="btn">Edit Quiz</a>

    <a href="#" id="quizes" data-id="{{ $quiz->id }}" data-token="{{ csrf_token() }}" class="btn js-delete">Delete</a>

    </div>
@endsection