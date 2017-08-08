<div class="col s12">
  <div class="row">
    <div class="col s12 m12 ">
      <span class="card-title"><strong>11. </strong>Currently, how often do you specifically exercise per week? (as opposed to incidental movement)</span>
    </div>
    <p class="range-field col s10 setSlider">
      <label>Currently, how often do you specifically exercise per week?</label>
      <input type="range" id="exercise_slider" name="exercise_slider" min="0" max="15" step="1" required value="{{ old('exercise_slider') }}">
      <span class="red-text text=lighten-1">{{ $errors->first('exercise') }}</span>
    </p>
    <div class="input-field col s2 setWaist">
      <input id="exercise" name="exercise" type="number" class="validate" required value="{{ old('exercise', '8') }}">
      <label for="exercise">#</label>
    </div> 
  </div>
</div>