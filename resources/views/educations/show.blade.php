@extends('layouts.app');

@section('content')
    <h2>Education id: {{ $education->id }}</h2>
    <hr>

    <p>{{ $education->description }}</p>

    <a href="{{ $education->video_url }}">{{ $education->video_url }}</a>

    <hr>

    <a href="{{ url('/educations') . '/' . $education->id . '/edit' }}" class="btn">Edit Education</a>

    <a href="#" id="educations" data-id="{{ $education->id }}" data-token="{{ csrf_token() }}" class="btn js-delete">Delete</a>

    </div>
@endsection