@extends('layouts.app')

@section('content')
    <h2>{{ $week->title }}</h2>
    <hr>

    <p>{{ $week->description }}</p>

    <p>Week number: <strong>{{ $week->week_number }}</strong></p>

    <hr>

    <a href="{{ url('/weeks') . '/' . $week->id . '/edit' }}" class="btn">Edit Week</a>

    <a href="#" 
        id="weeks" 
        data-id="{{ $week->id }}" 
        data-token="{{ csrf_token() }}" 
        data-url="{{ url('/weeks') . '/' . $week->id }}"
        data-redirect-url="{{ url('/weeks') }}"
        class="btn js-delete">Delete</a>

    </div>
@endsection