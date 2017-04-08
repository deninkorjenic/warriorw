@extends('layouts.app');

@section('content')
    <h2>{{ $week->title }}</h2>
    <hr>

    <p>{{ $week->description }}</p>

    <p>Week number: <strong>{{ $week->week_number }}</strong></p>

    <hr>

    <a href="{{ url('/weeks') . '/' . $week->id . '/edit' }}" class="btn">Edit Week</a>

    <a href="#" class="btn js-delete">Delete</a>

    </div>
@endsection