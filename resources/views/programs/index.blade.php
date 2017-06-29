@extends('layouts.app')

@section('content')
    <h2>Programs overview</h2>

    @include('messages.notifications.index')

    <table class="striped">
        <thead>
        <tr>
            <th>Program Title</th>
            <th>Program Description</th>
            <th>Number of Weeks</th>
        </tr>
        </thead>

        <tbody>
            @if(isset($programs))
                @foreach($programs as $program)
                    <tr>
                        <td><a href="{{ url('/programs/') . '/' . $program->id }}">{{ $program->title }}</a></td>
                        <td>{{ $program->description }}</td>
                        <td>{{ count($program->weeks) }}</td>
                        <td class="text-center"><a class="btn" href="{{ url('/programs') . '/' . $program->id . '/edit' }}">Edit</a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <hr>
    <br>
    <a href="{{ url('/programs/create') }}" class="btn">Crete Program</a>
@endsection