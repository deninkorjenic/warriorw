@extends('layouts.app')

@section('content')
    <h2>Educations overview</h2>

    @include('messages.errors.index')
    @include('messages.notifications.index')

    <table class="striped">
        <thead>
        <tr>
            <th>Education Description</th>
            <th>Education Video</th>
            <th>Points</th>
        </tr>
        </thead>

        <tbody>
            @if (isset($educations))
                @foreach($educations as $education)
                    <tr>
                        <td><a href="{{ url('/educations/') . '/' . $education->id }}">{{ $education->description }}</a></td>
                        <td><a href="{{ $education->video_url }}">{{ $education->video_url }}</a></td>
                        <td>{{ $education->points }}</td>
                        <td class="text-center"><a class="btn" href="{{ url('/educations') . '/' . $education->id . '/edit' }}">Edit</a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <hr>
    <br>
    <a href="{{ url('/educations/create') }}" class="btn">Crete Education</a>
@endsection
