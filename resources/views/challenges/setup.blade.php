@extends('layouts.profile')

@section('content')
<div class="row">
  <div class="col s12 m12">
    <h4>Challenges</h4>
    <p>
      Intro text explaining how challenges work. Lorem ipsum dolor sit amet.
    </p>
    <form action="{{ url('/challenges') }}" role="form" method="POST">
      {{ csrf_field() }}
      <div class="card">
        <div class="card-content">
          <div class="row">
            <div class="col s12 m8 l8">
              <span class="card-title">Challenge 1: <strong>I like to move it, move it</strong></span>
              <ul class="collection">
              @foreach($challenge_infos[0] as $challenge_info)
                <li class="collection-item">{!! $challenge_info !!}</li>
              @endforeach
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <span class="card-title">My 5 ways to move more</span>
              <div class="row">
                <div class="input-field col s12">
                  <input id="c1_a1" name="c1_a1" type="text" class="validate">
                  <label for="c1_a1">Write your challenge here</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="c1_a2" name="c1_a2" type="text" class="validate">
                  <label for="c1_a2">Write your challenge here</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="c1_a3" name="c1_a3" type="text" class="validate">
                  <label for="c1_a3">Write your challenge here</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="c1_a4" name="c1_a4" type="text" class="validate">
                  <label for="c1_a4">Write your challenge here</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="c1_a5" name="c1_a5" type="text" class="validate">
                  <label for="c1_a5">Write your challenge here</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-content">
          <div class="row">
            <div class="col s12 m8 l8">
              <span class="card-title">Challenge 2: <strong>Warriors just wanna have fun</strong></span>
              <ul class="collection">
              @foreach($challenge_infos[1] as $challenge_info)
                <li class="collection-item">{!! $challenge_info !!}</li>
              @endforeach
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <span class="card-title">Leisure activity I did</span>
              <div class="row">
                <div class="input-field col s12">
                  <input id="c2_a1" name="c2_a1" type="text" class="validate">
                  <label for="c2_a1">Write your challenge here</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="c2_a2" name="c2_a2" type="text" class="validate">
                  <label for="c2_a2">Write your challenge here</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="c2_a3" name="c2_a3" type="text" class="validate">
                  <label for="c2_a3">Write your challenge here</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="c2_a4" name="c2_a4" type="text" class="validate">
                  <label for="c2_a4">Write your challenge here</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="c2_a5" name="c2_a5" type="text" class="validate">
                  <label for="c2_a5">Write your challenge here</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-content">
          <div class="row">
            <div class="col s12 m8 l8">
              <span class="card-title">Challenge 3: <strong>7 heavenly habits</strong></span>
              <ul class="collection">
              @foreach($challenge_infos[2] as $challenge_info)
                <li class="collection-item">{!! $challenge_info !!}</li>
              @endforeach
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <span class="card-title">Habits to hit  Leisure activity I did</span>
              <div class="row">
                <div class="col s12">
                  <ul class="collection">
                  @foreach($habits[0] as $habit)
                    <li class="collection-item">{!! $habit !!}</li>
                  @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-content">
          <div class="row">
            <div class="col s12 m8 l8">
              <span class="card-title">Challenge 4: <strong>Sleeping beauty</strong></span>
              <ul class="collection">
              @foreach($challenge_infos[3] as $challenge_info)
                <li class="collection-item">{!! $challenge_info !!}</li>
              @endforeach
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <span class="card-title">Habits to hit  Leisure activity I did</span>
              <div class="row">
                <div class="col s12">
                  <ul class="collection">
                  @foreach($habits[1] as $habit)
                    <li class="collection-item">{!! $habit !!}</li>
                  @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m12">
          <input type="submit" value="Continue" class="waves-effect waves-light btn">
        </div>
      </div>
    </form>
  </div>
</div>
@endsection