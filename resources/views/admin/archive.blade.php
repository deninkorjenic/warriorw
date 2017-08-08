@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col s12">
    <div class="card">
      <div class="card-content">
          <ul class="tabs tabs-fixed-width">
            @foreach($programs as $program)
              @if($loop->first)
                <li class="tab col s2"><a href="#program1" class="active">{{ $program->title }}</a>
                </li>
              @else
                <li class="tab col s2"><a href="#program1">{{ $program->title }}</a>
                </li>
              @endif
            @endforeach
          </ul>
      </div>
    </div>
    @foreach($programs as $program)
      @if(count($program->weeks) > 0)
        @foreach($program->weeks as $week)
          @if(count($week->education) > 0)
            <h4>{{ $week->title }}</h4>
            <div class="row">
              @foreach($week->education as $education)
                <div class="col s12 m4">
                  <div class="card">
                    <div class="card-content">
                      <div class="video-container">
                        <iframe width="250" height="150" src={{ $education->video_url }} frameborder="0" allowfullscreen></iframe>
                      </div>
                    </div>
                    <div class="card-action">
                      <div class="input-field">
                        <input id="goal_2" type="text" name="goal_2" placeholder="Enter your goal here" value={{ $education->video_url }}>
                        <label for="goal_2" data-error="wrong" data-success="right">Video URL</label>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          @endif
        @endforeach
      @endif
    @endforeach
  </div>
</div>
@endsection