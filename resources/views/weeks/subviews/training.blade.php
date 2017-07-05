<tr>
  <td>{{ $days[$day] }}</td>
  <td>{{$training->description}}</td>
  <td>
    <input 
      type="checkbox" 
      class="filled-in training-checkbox"
      data-id="{{ $training->id }}"
      name="training-{{$day+1}}" 
      id="training-{{$day+1}}" 
      @if($training->completed) 
        checked 
        disabled
      @endif />
    <label for="training-{{$day+1}}"></label>
  </td>
</tr>