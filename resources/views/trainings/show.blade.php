@extends('layouts.app');

@section('content')
    <h2>Training id: {{ $training->id }}</h2>
    <hr>

    <p>{{ $training->description }}</p>

    <hr>

    <a href="{{ url('/trainings') . '/' . $training->id . '/edit' }}" class="btn">Edit Task</a>

    <a href="#" 
        id="trainings" 
        data-id="{{ $training->id }}"
        data-token="{{ csrf_token() }}"
        data-url="{{ url('/trainings') . '/' . $training->id }}"
        data-redirect-url="{{ url('/trainings') }}"
        class="btn js-delete">Delete</a>

    </div>
@endsection