@extends('layouts.profile')

@section('content')
<div class="row">
  <div class="col s12">
    <div class="row">
      <div class="col s12">
        <h4>Weekly Overview</h4>
      </div>
      <div class="col s12">
        @if(!$week->week_number == 0)
          <a href="{{ url('/quiz-') . $week->id }}" class="btn btn-large waves-effect">Revision Quiz</a>
          <a href="{{ url('/food-diary') }}" class="btn btn-large waves-effect">4 day food diary</a>
        @endif
        <a href="{{ url('/challenges') }}" class="btn btn-large waves-effect">Challenges</a>
      </div>
    </div>
    @if(isset($week->education))
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
                    @foreach($week->education as $key=>$edu)
                      @include('weeks.subviews.education', ['key' => $key, 'edu' => $edu])
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
    <!-- TODO: implement challenges adding and retriving from database -->
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
    @if(isset($week->tasks))
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
                  @foreach($week->tasks as $key=>$task)
                    @include('weeks.subviews.tasks', ['key' => $key, 'task' => $task])
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
 @include('weeks.subviews.education-modal')
@endsection
