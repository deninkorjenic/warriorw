@extends('layouts.app')

@section('content')
    <h2>Trainings overview</h2>

    @include('messages.errors.index')
    @include('messages.notifications.index')

    <table class="striped">
        <thead>
        <tr>
            <th>Training Description</th>
            <th>Points</th>
        </tr>
        </thead>

        <tbody>
            @if (isset($trainings))
                @foreach($trainings as $training)
                    <tr>
                        <td><a href="{{ url('/trainings/') . '/' . $training->id }}">{{ $training->description }}</a></td>
                        <td>{{ $training->points }}</td>
                        <td>{{ $training->training_id }}</td>
                        <td class="text-center"><a class="btn" href="{{ url('/trainings') . '/' . $training->id . '/edit' }}">Edit</a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <hr>
    <br>
    <a href="{{ url('/trainings/create') }}" class="btn">Crete Training</a>
@endsection