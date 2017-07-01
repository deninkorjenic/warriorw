<tr>
  <td>{{ $key+1 }}.</td>
  <td>{{$edu->description}}</td>
  <td>
    <a href="{{ $edu->video_url }}" class="black-text edu-modal-trigger"><i class="fa fa-video-camera" aria-hidden="true"></i> Watch video</a>
  </td>
  <td>
    <form action="{{ url('/week/education') }}" method="POST" class="right-align">
      <!-- Should remove this double check -->
      <input type="checkbox" class="filled-in" name="education-{{$key+1}}" id="education-{{$key+1}}" 
      @if(isset($edu->pivot->watched) && $edu->pivot->watched != 0) checked="checked" checked @endif />
      <label for="education-{{$key+1}}"></label>
    </form>
  </td>
</tr>