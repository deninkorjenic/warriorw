<td>
    @foreach( $programs as $program )
        @if($program->user_id === $user->id)
            {{ $program->program_type }}
        @endif
    @endforeach
</td>