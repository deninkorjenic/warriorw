@extends('layouts.app');

@section('content')
    <h2>Task id: {{ $task->id }}</h2>
    <hr>

    <p>{{ $task->description }}</p>

    <hr>

    <a href="{{ url('/tasks') . '/' . $task->id . '/edit' }}" class="btn">Edit Task</a>

    <a href="#" class="btn js-delete">Delete</a>

    </div>
@endsection