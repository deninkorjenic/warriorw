@extends('layouts.app');

@section('content')
    <h2>Weeks overview</h2>

    <table class="striped">
        <thead>
        <tr>
            <th>Week Title</th>
            <th>Week Number</th>
            <th>Total Points</th>
        </tr>
        </thead>

        <tbody>
            @if (isset($weeks))
                @foreach($weeks as $week)
                    <tr>
                        <td><a href="{{ url('/weeks/') . '/' . $week->id }}">{{ $week->title }}</a></td>
                        <td>{{ $week->week_number }}</td>
                        <td>{{ $week->maximum_points }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <hr>
    <br>
    <a href="{{ url('/weeks/create') }}" class="btn">Crete Week</a>
@endsection