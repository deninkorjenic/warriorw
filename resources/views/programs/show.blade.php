@extends('layouts.app');

@section('content')
    <h2>{{ $program->title }}</h2>
    <hr>

    <p>{{ $program->description }}</p>

    <p>Number of Weeks: <strong>{{ count($program->weeks) }}</strong></p>

    <hr>

    <a href="{{ url('/programs') . '/' . $program->id . '/edit' }}" class="btn">Edit Program</a>

    <a href="#" id="programs" data-id="{{ $program->id }}" data-token="{{ csrf_token() }}" class="btn js-delete">Delete</a>

    </div>
@endsection