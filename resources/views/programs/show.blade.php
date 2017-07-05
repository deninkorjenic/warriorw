@extends('layouts.app');

@section('content')
    <h2>{{ $program->title }}</h2>
    <hr>

    <p>{{ $program->description }}</p>

    <p>Number of Weeks: <strong>{{ count($program->weeks) }}</strong></p>

    <hr>

    <a href="{{ url('/programs') . '/' . $program->id . '/edit' }}" class="btn">Edit Program</a>

    <a href="#" 
        id="programs" 
        data-id="{{ $program->id }}" 
        data-token="{{ csrf_token() }}"
        data-url="{{ url('/programs') . '/' . $program->id }}"
        data-redirect-url="{{ url('/programs') }}"
        class="btn js-delete">Delete</a>

    </div>
@endsection