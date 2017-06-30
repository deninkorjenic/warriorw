@extends('layouts.app')

@section('content')
    <h2>Quizes overview</h2>

    @include('messages.errors.index')
    @include('messages.notifications.index')

    <table class="striped">
        <thead>
        <tr>
            <th>Question</th>
            <th>Answer</th>
            <th>Points</th>
        </tr>
        </thead>

        <tbody>
            @if (isset($quizes))
                @foreach($quizes as $quiz)
                    <tr>
                        <td><a href="{{ url('/quizes/') . '/' . $quiz->id }}">{{ $quiz->question }}</a></td>
                        <td>{{ $quiz->correct_answer }}</td>
                        <td>{{ $quiz->points }}</td>
                        <td class="text-center"><a class="btn" href="{{ url('/quizes') . '/' . $quiz->id . '/edit' }}">Edit</a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <hr>
    <br>
    <a href="{{ url('/quizes/create') }}" class="btn">Create Quiz</a>
@endsection