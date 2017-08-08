<tr>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    @include('admin.partials.program_type')
    <td>{{ $user->mobile_number }}</td>
    <td>{{ $user->program_start }}</td>
    <td>{{ $user->last_day }}</td>
    <td>{{ App\Models\UserProgram::getCurrentWeek($user->id) }}</td>

    @if( App\Models\UserProgram::where('user_id', $user->id)->first()->adherence == 'normal' )

        <td class="medium material-icons">sentiment_very_satisfied</td>

    @elseif( App\Models\UserProgram::where('user_id', $user->id)->first()->adherence == 'bad' )

        <td class="medium material-icons">sentiment_dissatisfied</td>

    @else

        <td class="medium material-icons">sentiment_very_dissatisfied</td>

    @endif
    <td>{{ App\Models\UserProgram::getCurrentPoints($user->id) }} / {{ App\Models\UserProgram::getOverallPointsAvailable($user->id) }}</td>
    <td>{{ round(( App\Models\UserProgram::getCurrentPoints($user->id) / App\Models\UserProgram::getOverallPointsAvailable($user->id) ) * 100, 2) }} %</td>
</tr>