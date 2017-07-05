<tr>
    <td>{{ $key+1 }}.</td>
    <td>{{ $task->description }}</td>
    <td>
        <input 
            type="checkbox" 
            class="filled-in task-checkbox"
            data-id="{{ $task->id }}"
            name="task-{{ $key+1 }}" 
            id="task-{{ $key+1 }}" 
            @if($task->completed)
                checked
                disabled
            @endif />
        <label for="task-{{ $key+1 }}"></label>
    </td>
</tr>