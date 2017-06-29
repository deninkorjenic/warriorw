<tr>
    <td>{{ $key+1 }}.</td>
    <td>{{ $task->description }}</td>
    <td>
        <form action="#">
            <input type="checkbox" class="filled-in" name="task-{{ $key+1 }}" id="task-{{ $key+1 }}" @if(isset($task->pivot->completed) && $task->pivot->completed != 0) checked="checked" checked @endif />
            <label for="task-{{ $key+1 }}"></label>
        </form>
    </td>
</tr>