<tr @if(!$webinars[$key]) class="grey-text" @endif>
  <td>{{ $key+1 }}.</td>
  <td>{{$edu[0]}}</td>
  <td>
    @if($webinars[$key])
      <a href="#monday" class="black-text modal-trigger"><i class="fa fa-video-camera" aria-hidden="true"></i> Watch video</a>
    @else
      Available on wednesday
    @endif
  </td>
  <td>
    <form action="{{ url('/week/education') }}" method="POST" class="right-align">
      <input @if(!$webinars[$key]) disabled="disabled" @endif type="checkbox" class="filled-in" name="education-{{$key+1}}" id="education-{{$key+1}}" 
      @if($edu[1]) checked="checked" checked @endif />
      <label for="education-{{$key+1}}"></label>
    </form>
  </td>
</tr>