@extends('layouts.profile')

@section('content')
<div class="row">
  <div class="col s12">
    <h4 class="card-title">
      4 Day Food Diary
    </h4>
    <p><strong>Directions: </strong><i>be descriptive so that quantities and extras are described. Don't leave anything out - you're only cheating yourself!</i></p>
    <hr>
    @for($i=1; $i<5; $i++)
      <h5>Day {{$i}}</h5>
      <div class="row">
        <div class="col s12 m6">
          <i>Before and including lunch</i>
          <div class="card">
            <div class="card-content">
              <div class="row">
                <div class="col s12 m6">
                  <span class="card-title">What I ate</span>
                  <form action="#">
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                  </form>
                </div>
                <div class="col s12 m6">
                  <span class="card-title">What I drank</span>
                  <form action="#">
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="card-action right-align">
              <a href="#" onclick="document.getElementById('my_goals').submit();">Update</a>
            </div>
          </div>
        </div>
        <div class="col s12 m6">
          <i>After lunch</i>
          <div class="card">
            <div class="card-content">
              <div class="row">
                <div class="col s12 m6">
                  <span class="card-title">What I ate</span>
                  <form action="#">
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                  </form>
                </div>
                <div class="col s12 m6">
                  <span class="card-title">What I drank</span>
                  <form action="#">
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                    <div class="input-field">
                      <input id="c1_a1" name="c1_a1" type="text" class="validate">
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="card-action right-align">
              <a href="#" onclick="document.getElementById('my_goals').submit();">Update</a>
            </div>
          </div>
        </div>
      </div>
    @endfor
  </div>
 </div> 
@endsection
