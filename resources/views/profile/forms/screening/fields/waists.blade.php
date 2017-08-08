<div class="col s12">
  <div class="row">
    <div class="col s12 m12 ">
      <span class="card-title"><strong>9. </strong>What is your waist circumference?</span>
    </div>
    <div class="col s12 m3 input-field">
      <select id="unit" name="unit" required>  
        <option value="cm" selected>Centimetres</option>
        <option value="in">Inches</option>
      </select>
      <label>Units</label> 
    </div>
    <p class="range-field col s7 setSliderWaist">
      <label>What is your waist circumference (cm)?</label>
      <input type="range" id="waist_slider" name="waist_slider" min="60" max="140" step="0.5" required value="{{ old('waist_slider') }}">
      <span class="red-text text=lighten-1">{{ $errors->first('waist') }}</span>
    </p>
    <div class="input-field col s2 setWaist">
      <input id="waist" name="waist" type="number" class="validate" required value="{{ old('waist', '100') }}">
      <label for="waist">Waist</label>                    
    </div> 
  </div>
</div>