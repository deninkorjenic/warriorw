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
                <li class="collection-item">1. List 5 ways to increase movement in your everyday life. You can use examples provided in the Physical Activity Guide if they apply to you. They needn't be big things - in fact the smaller and seemingly more trivial the better.
                </li>
                <li class="collection-item">2. Begin implementing all of them immediately.</li>
                <li class="collection-item">3. To complete the challenge, write the things you'll do into the form on the right. Give yourself a tick each time you do this thing. Aim for 5 ticks for each item per week for 3 consecutive weeks to achieve full points.</li>
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
                <li class="collection-item">1. Do at least one leisure based activity, which takes at least 45 minutes, per week for 5 weeks</li>
                <li class="collection-item">2. Write in the activity that you did (or don't type anything if you didn't do an activity)</li>
                <li class="collection-item">3. Each activity scores you points. Here's the catch: do not write anything if you thought you weren't properly "in the moment" (e.g. distracted by work, your phone etc). Be honest with yourself!</li>
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
                <li class="collection-item">1. To the right are 7 of the best habits for sustainable lifelong god nutrition. Getting into a routine and making these kinds of habits second nature is critical.</li>
                <li class="collection-item">2. Aim to stick to all 7 habits for each of the 5 weeks of this challenge.</li>
                <li class="collection-item">3. Add a tick in the box for each week that you met the habit.</li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <span class="card-title">Habits to hit  Leisure activity I did</span>
              <div class="row">
                <div class="col s12">
                  <ul class="collection">
                    <li class="collection-item">1. Pack lunch from home <strong>(at least 4 out of 5 days)</strong></li>
                    <li class="collection-item">2. Remove junk food from the house  <strong>(requires 100% adherence for a tick)</strong></li>
                    <li class="collection-item">3. Cut sugar from coffee & tea <strong>(requires 100% adherence for a tick)</strong></li>
                    <li class="collection-item">4. Cut butter/margarine from bread <strong>(requires 100% adherence for a tick)</strong></li>
                    <li class="collection-item">5. Sunday cook up (prepare several dinners and lunches for the week ahead, especially for days you know wou'll be pushed for time) <strong>(requires 100% adherence for a tick)</strong></li>
                    <li class="collection-item">6. No mindless eating (food in front of screens) <strong>(requires 100% adherence for a tick)</strong></li>
                    <li class="collection-item">7. Max 1 restaurant/café meal per week + no 'one-off treats' from the bread shop/café/corner store <strong>(requires 100% adherence for a tick)</strong></li>
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
                <li class="collection-item">1. For 3 weeks, keep a rough track of your bed time, waking time, how long it took you to get to sleep and any other time throughout the night you were in bed but awake.</li>
                <li class="collection-item">2. Average out the results for the week and use hours in bed versus hours actually asleep to roughly determine your sleep efficiency for each week. Aim to be above 90%. Sleep efficiency counts for half of the point awarded in this challenge. </li>
                <li class="collection-item">3. For each week you'll also need to tick off your adherence to specific sleep hygiene habits. This counts for the other half of your total score for the challenge.</li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <span class="card-title">Habits to hit  Leisure activity I did</span>
              <div class="row">
                <div class="col s12">
                  <ul class="collection">
                    <li class="collection-item"><h5>Sleep efficiency</h5></li>
                    <li class="collection-item">1. Hours spent in bed (Note - different from the number of hours spent actually sleeping) <strong>(on average for the week)</strong></li>
                    <li class="collection-item">2. Hours spent sleeping <strong>(on average for the week)</strong></li>
                    <li class="collection-item"><h5>Sleep hygiene</h5></li>
                    <li class="collection-item">3. Kept to a specific bed time routine <strong>(at least 5 of 7 nights)</strong></li>
                    <li class="collection-item">4. Made my environment conducive to sleep: dark, cool, well ventilated, comfortable (note: quietness not always controllable so not included in this list) <strong>(at least 5 of 7 nights)</strong></li>
                    <li class="collection-item">5. Did nothing else but sleep and sex in bed <strong>(requires 100% adherence for a tick)</strong></li>
                    <li class="collection-item">6. Got to sleep within 20 mins of lying down, or if not, got out of bed until tired again <strong>(requires 100% adherence for a tick)</strong></li>
                    <li class="collection-item">7. Avoided caffeine and excessive alcohol consumption in the few hours before bed <string>(at least 5 of 7 nights)</strong></li>
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