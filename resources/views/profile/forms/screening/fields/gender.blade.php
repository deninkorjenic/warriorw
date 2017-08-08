<div class="col s12 m6">
  <div class="row tooltipped" data-position="bottom" data-delay="50" data-tooltip="Why do we need to ask about gender? Health and fitness baselines differ between males and females. Asking this questions allows us to compare your answers below to the right dataset and therefore assign you the most appropriate fitness training program. Your answer should reflect your biological sex.">
    <div class="col s12">
      <span class="card-title"><strong>1. </strong>I am:</span>
    </div>
    <div class="col s6">
      <input name="gender" type="radio" id="male" value="male" 
      @if(old('gender') == 'male')
        checked
      @endif
      required>
      <label for="male">Male</label>
    </div>
    <div class="col s6">
      <input name="gender" type="radio" id="female" value="female"
      @if(old('gender') == 'female')
        checked
      @endif>
      <label for="female">Female</label>
    </div>
  </div>
  <span class="red-text text-lighten-1">{{ $errors->first('gender') }}</span>
</div>