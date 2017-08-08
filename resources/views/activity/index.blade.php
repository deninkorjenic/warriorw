@extends('layouts.app')

@section('content')
    <h4>Activities</h4>
    <table class="responsive-table highlight striped">
        <thead>
            <tr>
                <td>Name</td>
                <td>Value</td>
                <td>Points</td>
            </tr>
        </thead>
        <tbody>
            @foreach($activities as $activity)
                <tr>
                    <td>{{ $activity->name }}</td>
                    <td>{{ $activity->value }}</td>
                    <td>{{ $activity->points }}</td>
                    <td class="text-center"><a class="btn" href="{{ url('/activities') . '/' . $activity->id . '/edit' }}">Edit</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $activities->links() }}
    <a href="{{ url('/activities/create') }}" class="btn">Crete Activity</a>
@endsection