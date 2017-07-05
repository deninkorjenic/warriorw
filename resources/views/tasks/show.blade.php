@extends('layouts.app');

@section('content')
    <h2>Task id: {{ $task->id }}</h2>
    <hr>

    <p>{{ $task->description }}</p>

    <hr>

    <a href="{{ url('/tasks') . '/' . $task->id . '/edit' }}" class="btn">Edit Task</a>

    <a href="#" 
        id="tasks" 
        data-id="{{ $task->id }}" 
        data-token="{{ csrf_token() }}"
        data-url="{{ url('/tasks') . '/' . $task->id }}"
        data-redirect-url="{{ url('/tasks') }}"
        class="btn js-delete">Delete</a>

    </div>
@endsection