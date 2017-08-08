<div class="col s12">
  <div class="row">
    <div class="col s12 m12 ">
      <span class="card-title"><strong>10. </strong>What is your resting heart rate? (in beats per minute)</span>
    </div>
    <p class="range-field col s10 setSlider">
      <label>What is your resting heart rate?</label>
      <input type="range" id="heart_slider" name="heart_slider" min="30" max="120" step="1" required value="{{ old('heart_slider') }}">
      <span class="red-text text-lighten-1">{{ $errors->first('heart') }}</span>
    </p>
    <div class="input-field col s2 setWaist">
      <input id="heart" name="heart" type="number" class="validate" required value="{{ old('heart', '75') }}">
      <label for="heart">H.Rate</label>
    </div> 
  </div>
</div>