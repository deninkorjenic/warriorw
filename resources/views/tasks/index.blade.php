@extends('layouts.app')

@section('content')
    <h2>Tasks overview</h2>

    @include('messages.errors.index')
    @include('messages.notifications.index')

    <table class="striped">
        <thead>
        <tr>
            <th>Task Description</th>
            <th>Points</th>
        </tr>
        </thead>

        <tbody>
            @if (isset($tasks))
                @foreach($tasks as $task)
                    <tr>
                        <td><a href="{{ url('/tasks/') . '/' . $task->id }}">{{ $task->description }}</a></td>
                        <td>{{ $task->points }}</td>
                        <td>{{ $task->task_id }}</td>
                        <td class="text-center"><a class="btn" href="{{ url('/tasks') . '/' . $task->id . '/edit' }}">Edit</a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <hr>
    <br>
    <a href="{{ url('/tasks/create') }}" class="btn">Crete Task</a>
@endsection