@extends('layouts.dashgrid')

@section('content')
<div class="container">
  <div class="row">
    <div class="col s12">
    <div class="card">
      <div class="card-content">
          <ul class="tabs tabs-fixed-width">
            <li class="tab col s2"><a href="#program1" class="active">Program 1</a></li>
            <li class="tab col s2"><a href="#program2">Program 2</a></li>
            <li class="tab col s2"><a href="#program3">Program 3</a></li>
            <li class="tab col s2"><a href="#program4">Program 4</a></li>
            <li class="tab col s2"><a href="#program5">Program 5</a></li>
          </ul>
        <div id="program1" class="col s12"></div>
        <div id="program2" class="col s12"></div>
        <div id="program3" class="col s12"></div>
        <div id="program4" class="col s12"></div>
        <div id="program5" class="col s12"></div>
      </div>
    </div>
    @for($i = 1; $i<16; $i++)
        <h4>Week {{$i}}</h4>
        <div class="row">
          <div class="col s12 m4">
            <div class="card">
              <div class="card-content">
                <div class="video-container">
                  <iframe width="250" height="150" src="//www.youtube.com/embed/Q8TXgCzxEnw?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
              <div class="card-action">
                <div class="input-field">
                  <input id="goal_2" type="text" name="goal_2" placeholder="Enter your goal here" value="www.youtube.com/embed/Q8TXgCzxEnw">
                  <label for="goal_2" data-error="wrong" data-success="right">Video URL</label>
                </div>
              </div>
            </div>
          </div>
          <div class="col s12 m4">
            <div class="card">
              <div class="card-content">
                <div class="video-container">
                  <iframe width="250" height="150" src="//www.youtube.com/embed/Q8TXgCzxEnw?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
              <div class="card-action">
                <div class="input-field">
                  <input id="goal_2" type="text" name="goal_2" placeholder="Enter your goal here" value="www.youtube.com/embed/Q8TXgCzxEnw">
                  <label for="goal_2" data-error="wrong" data-success="right">Video URL</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endfor
  </div> 
</div>
@endsection
