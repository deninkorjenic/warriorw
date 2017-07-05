<tr>
  <td>{{ $key+1 }}.</td>
  <td>{{$edu->description}}</td>
  <td>
    <a href="{{ $edu->video_url }}" class="black-text edu-modal-trigger" data-modal-holder=".watch-edu-modal"><i class="fa fa-video-camera" aria-hidden="true"></i> Watch video</a>
  </td>
  <td>
    <input 
      type="checkbox" 
      class="filled-in education-checkbox"
      data-id="{{ $edu->id }}"
      name="education-{{$key+1}}" 
      id="education-{{$key+1}}" 
      @if($edu->watched) 
        checked 
        disabled
      @endif />
    <label for="education-{{$key+1}}"></label>
  </td>
</tr>