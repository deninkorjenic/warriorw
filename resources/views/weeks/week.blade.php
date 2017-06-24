@extends('layouts.profile')

@section('content')
<div class="row">
  <div class="col s12">
    <div class="row">
      <div class="col s12">
        <h4>Weekly Overview</h4>
      </div>
      <div class="col s12">
        @if(!$number == 0)
          <a href="{{ url('/quiz-') . $number}}" class="btn btn-large waves-effect">Revision Quiz</a>
          <a href="{{ url('/food-diary') }}" class="btn btn-large waves-effect">4 day food diary</a>
        @endif
        <a href="{{ url('/challenges') }}" class="btn btn-large waves-effect">Challenges</a>
      </div>
    </div>
    @if(isset($week->{'Education'}))
    <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-content">
              <table class="highlight responsive">
                <span class="card-title">
                  Education
                </span>
                <thead>
                  <tr>
                      <th>#</th>
                      <th>Details</th>
                      <th>Video</th>
                      <th class="right-align">Watched</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($week->{'Education'} as $k=>$t)
                      <tr @if(!$webinars[$k]) class="grey-text" @endif>
                        <td>{{ $k+1 }}.</td>
                        <td>{{$t[0]}}</td>
                        <td>
                          @if($webinars[$k])
                            <a href="#monday" class="black-text modal-trigger"><i class="fa fa-video-camera" aria-hidden="true"></i> Watch video</a>
                          @else
                            Available on wednesday
                          @endif
                        </td>
                        <td>
                          <form action="{{ url('/week/education') }}" method="POST" class="right-align">
                            <input @if(!$webinars[$k]) disabled="disabled" @endif type="checkbox" class="filled-in" name="education-{{$k+1}}" id="education-{{$k+1}}" @if($t[1]) checked="checked" checked @endif />
                            <label for="education-{{$k+1}}"></label>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table> 
          </div>
          <div class="card-action right-align">
            <a href="#" onclick="document.getElementById('my_goals').submit();">Update</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-content">
            <span class="card-title">Challenges running this week</span>
            <a href="#"><h5>I like to move it, move it!</h5></a>
          </div>
        </div>
      </div>
    </div>
    @endif
    <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-content">
            <table class="highlight">
              <span class="card-title">
                Tasks
              </span>
              <thead>
                <tr>
                    <th>#</th>
                    <th>Details</th>
                    <th>Done</th>
                </tr>
              </thead>
              <tbody>
                @foreach($week->Tasks as $k=>$t)
                  <tr>
                    <td>{{ $k+1 }}.</td>
                    <td>{{$t[0]}}</td>
                    <td>
                      <form action="#" class="right-align">
                        <input type="checkbox" class="filled-in" name="task-{{$k+1}}" id="task-{{$k+1}}" @if($t[1]) checked="checked" checked @endif />
                        <label for="task-{{$k+1}}"></label>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-action right-align">
            <a href="#" onclick="document.getElementById('my_goals').submit();">Update</a>
          </div>
        </div>
      </div>
    </div>
    @if(isset($week->{'Training plan'}))
    <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-content">
            <table class="highlight">
              <span class="card-title">
                Training plan
              </span>
              <thead>
                <tr>
                    <th>Day</th>
                    <th>Details</th>
                    <th>Done</th>
                </tr>
              </thead>
              <tbody>
                @php($days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday', 'Sunday'])
                @foreach($week->{'Training plan'} as $k=>$t)
                  <tr>
                    <td>{{ $days[$k] }}</td>
                    <td>{{$t[0]}}</td>
                    <td>
                      <form action="#" class="right-align">
                        <input type="checkbox" class="filled-in" name="training-{{$k+1}}" id="training-{{$k+1}}" @if($t[1]) checked="checked" checked @endif />
                        <label for="training-{{$k+1}}"></label>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table> 
          </div>
          <div class="card-action right-align">
            <a href="#" onclick="document.getElementById('my_goals').submit();">Update</a>
          </div>
        </div>
      </div>
    </div>
    @endif 
  </div>
 </div> 

@if($webinars[0])
  <div id="monday" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Monday webinar</h4>
      <iframe src="https://www.youtube.com/embed/CUWD-Zu2Cu4?ecver=2" width="640" height="360" frameborder="0" style="position:absolute;width:100%;height:100%;left:0" allowfullscreen></iframe>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
    </div>
  </div>
@endif
@if($webinars[1])
  <div id="wednesday" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <iframe src="https://www.youtube.com/embed/CUWD-Zu2Cu4?ecver=2" width="640" height="340" frameborder="0" style="position:absolute;width:100%;height:100%;left:0" allowfullscreen></iframe>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
    </div>
  </div>
@endif
@endsection
