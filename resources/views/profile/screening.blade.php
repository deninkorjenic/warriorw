@extends('layouts.profile')

@section('content')
<div class="row">
  <div class="col s12 m12">
    <div class="card">
      <div class="card-content">
        <div class="row">
          <div class="col s12">
            <h4>Pre-screening test</h4>
            <form action="{{ url('/screening-test') }}" role="form" method="POST">
              {{ csrf_field() }}
              <div class="row">
                <div class="col s12 m6">
                  <div class="row tooltipped" data-position="bottom" data-delay="50" data-tooltip="Why do we need to ask about gender? Health and fitness baselines differ between males and females. Asking this questions allows us to compare your answers below to the right dataset and therefore assign you the most appropriate fitness training program. Your answer should reflect your biological sex.">
                    <div class="col s12">
                      <span class="card-title"><strong>1. </strong>I am:</span>
                    </div>
                    <div class="col s6">
                      <input name="gender" type="radio" id="male" value="male" />
                      <label for="male">Male</label>
                    </div>
                    <div class="col s6">
                      <input name="gender" type="radio" id="female" value="female" />
                      <label for="female">Female</label>
                    </div>
                  </div>
                </div>
                <div class="col s12 m6">
                  <div class="row">
                    <p class="range-field col s9">
                      <span class="card-title"><strong>2. </strong>Choose your age</span>
                      <input type="range" id="age_slider" name="age_slider" min="14" max="90" />
                    </p>
                    <div class="input-field col s3 location">
                      <input id="age" name="age" type="text" value="52" class="validate">
                      <label for="age">Age</label>                    
                    </div> 
                  </div>
                </div>
              </div>
              <div class="row q3">
                <div class="col s10 m10">
                  <span class="card-title"><strong>3. </strong>Has your doctor ever told you that you have a heart condition, or have you ever suffered a stroke?</span>
                </div>
                <div class="col s2 m2">
                  <div class="switch">
                    <label>
                      NO
                      <input type="checkbox" name="q3" id="q3" value="1">
                      <span class="lever"></span>
                      YES
                    </label>
                  </div>
                </div>
                <div class="input-field hidden col s12 m6">
                  <input id="q3_a1" name="q3_a1" type="text" class="validate">
                  <label for="q3_a1">Please elaborate in any way you can</label> 
                </div>
                <div class="input-field hidden col s12 m6">
                  <input id="q3_a2" name="q3_a2" type="text" class="validate">
                  <label for="q3_a2">When did this occur (how many months ago)?</label> 
                </div>
              </div>


              <div class="row q4">
                <div class="col s10 m10">
                  <span class="card-title"><strong>4. </strong>Do you ever experience unexplained pains in your chest?</span>
                </div>
                <div class="col s2 m2">
                  <div class="switch">
                    <label>
                      NO
                      <input type="checkbox" name="q4" id="q4" value="1">
                      <span class="lever"></span>
                      YES
                    </label>
                  </div>
                </div>
                <div class="input-field hidden col s12 m6">
                  <input id="q4_a1" name="q4_a1" type="text" class="validate">
                  <label for="q4_a1">Please elaborate in any way you can</label> 
                </div>
                <div class="input-field hidden col s12 m6">
                  <input id="q4_a2" name="q4_a2" type="text" class="validate">
                  <label for="q4_a2">When did this occur (how many months ago)?</label> 
                </div>
              </div>

              <div class="row q5">
                <div class="col s10 m10">
                  <span class="card-title"><strong>5. </strong>Do you ever feel faint or have spells of dizziness during which cause you to lose balance?</span>
                </div>
                <div class="col s2 m2">
                  <div class="switch">
                    <label>
                      NO
                      <input type="checkbox" name="q5" id="q5" value="1">
                      <span class="lever"></span>
                      YES
                    </label>
                  </div>
                </div>
                <div class="input-field hidden col s12 m6">
                  <input id="q5_a1" name="q5_a1" type="text" class="validate">
                  <label for="q5_a1">Please elaborate in any way you can</label> 
                </div>
                <div class="input-field hidden col s12 m6">
                  <input id="q5_a2" name="q5_a2" type="text" class="validate">
                  <label for="q5_a2">When did this occur (how many months ago)?</label> 
                </div>
              </div>

              <div class="row q6">
                <div class="col s10 m10">
                  <span class="card-title"><strong>6. </strong>Have you had an asthma attack requiring immediate medical attention at any time over the last 12 months?</span>
                </div>
                <div class="col s2 m2">
                  <div class="switch">
                    <label>
                      NO
                      <input type="checkbox" name="q6" id="q6" value="1">
                      <span class="lever"></span>
                      YES
                    </label>
                  </div>
                </div>
                <div class="input-field hidden col s12 m6">
                  <input id="q6_a1" name="q6_a1" type="text" class="validate">
                  <label for="q6_a1">Please elaborate in any way you can</label> 
                </div>
                <div class="input-field hidden col s12 m6">
                  <input id="q6_a2" name="q6_a2" type="text" class="validate">
                  <label for="q6_a2">When did this occur (how many months ago)?</label> 
                </div>
              </div>

              <div class="row q7">
                <div class="col s10 m10">
                  <span class="card-title"><strong>7. </strong>Have you had trouble controlling your blood glucose in the last 3 months? (with or without diagnosed type I or II diabetes)</span>
                </div>
                <div class="col s2 m2">
                  <div class="switch">
                    <label>
                      NO
                      <input type="checkbox" name="q7" id="q7" value="1">
                      <span class="lever"></span>
                      YES
                    </label>
                  </div>
                </div>
                <div class="input-field hidden col s12 m6">
                  <input id="q7_a1" name="q7_a1" type="text" class="validate">
                  <label for="q7_a1">Please elaborate in any way you can</label> 
                </div>
                <div class="input-field hidden col s12 m6">
                  <input id="q7_a2" name="q7_a2" type="text" class="validate">
                  <label for="q7_a2">When did this occur (how many months ago)?</label> 
                </div>
              </div>

              <div class="row q8">
                <div class="col s10 m10">
                  <span class="card-title"><strong>8. </strong>Do you have any muscle, bone or joint problems, past injuries or pain that may limit your ability to undertake certain exercises?</span>
                </div>
                <div class="col s2 m2">
                  <div class="switch">
                    <label>
                      NO
                      <input type="checkbox" name="q8" id="q8" value="1">
                      <span class="lever"></span>
                      YES
                    </label>
                  </div>
                </div>
                <div class="input-field hidden col s12 m6">
                  <input id="q8_a1" name="q8_a1" type="text" class="validate">
                  <label for="q8_a1">Please elaborate in any way you can</label> 
                </div>
                <div class="input-field hidden col s12 m6">
                  <input id="q8_a2" name="q8_a2" type="text" class="validate">
                  <label for="q8_a2">When did this occur (how many months ago)?</label> 
                </div>
              </div>

              <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="col s12 m12 ">
                      <span class="card-title"><strong>9. </strong>What is your waist circumference?</span>
                    </div>
                    <div class="col s12 m3 input-field">
                      <select id="unit" name="unit">  
                        <option value="cm" selected>Centimetres</option>
                        <option value="in">Inches</option>
                      </select>
                      <label>Units</label> 
                    </div>
                    <p class="range-field col s7 setSlider">
                      <label>What is your waist circumference (cm)?</label>
                      <input type="range" id="waist_slider" name="waist_slider" min="60" max="140" step="0.5" />
                    </p>
                    <div class="input-field col s2 setWaist">
                      <input id="waist" name="waist" type="text" value="100" class="validate">
                      <label for="waist">Waist</label>                    
                    </div> 
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="col s12 m12 ">
                      <span class="card-title"><strong>10. </strong>What is your resting heart rate? (in beats per minute)</span>
                    </div>
                    <p class="range-field col s10 setSlider">
                      <label>What is your resting heart rate?</label>
                      <input type="range" id="heart_slider" name="heart_slider" min="30" max="120" step="1" />
                    </p>
                    <div class="input-field col s2 setWaist">
                      <input id="heart" name="heart" type="text" value="75" class="validate">
                      <label for="heart">H.Rate</label>
                    </div> 
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="col s12 m12 ">
                      <span class="card-title"><strong>11. </strong>Currently, how often do you specifically exercise per week? (as opposed to incidental movement)</span>
                    </div>
                    <p class="range-field col s10 setSlider">
                      <label>Currently, how often do you specifically exercise per week?</label>
                      <input type="range" id="exercise_slider" name="exercise_slider" min="0" max="15" step="1" />
                    </p>
                    <div class="input-field col s2 setWaist">
                      <input id="exercise" name="exercise" type="text" value="8" class="validate">
                      <label for="exercise">#</label>
                    </div> 
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="col s12 m12 ">
                      <span class="card-title"><strong>12. </strong>When you do work out, how hard do you work?</span>
                    </div>
                    <div class="col s12">
                      <p>
                        <input class="with-gap" name="q12" type="radio" id="q10a1" value="3" />
                        <label for="q10a1">I take it easy without breathing hard or sweating</label>
                      </p>
                      <p>
                        <input class="with-gap" name="q12" type="radio" id="q10a2" value="2" />
                        <label for="q10a2">A little hard breathing and/or sweating</label>
                      </p>
                      <p>
                        <input class="with-gap" name="q12" type="radio" id="q10a3" value="1" />
                        <label for="q10a3">I go all out</label>
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="col s12 m12 ">
                      <span class="card-title"><strong>13. </strong>What kind of physical activities do you enjoy most? </span>
                    </div>
                    <div class="input-field col s12">
                      <select multiple name="q13[]" id="q13">
                        <option value="" disabled selected>Tick at least one, and up 5 boxes</option>
                        <option value="hiking">Hiking</option>
                        <option value="climbing">Climbing</option>
                        <option value="boxing and kickboxing">Boxing and Kickboxing</option>
                        <option value="dance">Dance</option>
                        <option value="weight training">Weight training</option>
                        <option value="bootcamp">Bootcamp</option>
                        <option value="rowing or kayaking">Rowing or kayaking</option>
                        <option value="walking">Walking</option>
                        <option value="aerobics">Aerobics</option>
                        <option value="swimming or diving">Swimming or diving</option>
                        <option value="cycling">Cycling</option>
                        <option value="jogging or running">Jogging or running</option>
                        <option value="golf">Golf</option>
                        <option value="tennis">Tennis</option>
                        <option value="netball">Netball</option>
                        <option value="soccer">Soccer</option>
                        <option value="afl">AFL</option>
                        <option value="rugby">Rugby League or Union</option>
                        <option value="hockey">Hockey</option>
                        <option value="squash">Squash</option>
                        <option value="badminton">Badminton</option>
                        <option value="basketball">Basketball</option>
                        <option value="other group fitness">Other group fitness</option>
                        <option value="martial arts">Martial arts</option>
                        <option value="gymnastics">Gymnastics</option>
                        <option value="yoga">Yoga</option>
                        <option value="pilates">Pilates</option>
                        <option value="social">Anything social / in teams / in groups</option>
                        <option value="any">Any (not fussy)</option>
                        <option value="athletics throwing">Athletics (throwing events)</option>
                        <option value="athletics jumping">Athletics (jumping events)</option>
                        <option value="horse riding">Horse riding</option>
                        <option value="cricket">Cricket</option>
                        <option value="baseball">Baseball</option>
                      </select>
                      <label>What kind of physical activities do you enjoy most?</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col s12 m12">
                  <input type="submit" value="Finish" class="waves-effect waves-light btn">
                </div>
              </div>              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
