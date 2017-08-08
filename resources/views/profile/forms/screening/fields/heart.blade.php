<div class="col s10 m10">
  <span class="card-title"><strong>3. </strong>Has your doctor ever told you that you have a heart condition, or have you ever suffered a stroke?</span>
</div>
<div class="col s2 m2">
  <div class="switch">
    <label>
      NO
      <input type="checkbox" name="q3" id="q3" 
      @if( old('q3') == 'on')
        checked
      @endif
      value="{{ old('q3', 'off') }}">
      <span class="lever"></span>
      YES
    </label>
  </div>
</div>
<div class="input-field hidden col s12 m6">
  <input id="q3_a1" name="" type="text" class="validate" value="{{ old('q3_a1') }}">
  <label for="q3_a1">Please elaborate in any way you can</label> 
  <span class="red-text text-lghten-1">{{ $errors->first('q3_a1') }}</span>
</div>
<div class="input-field hidden col s12 m6">
  <input id="q3_a2" name="" type="number" class="validate" value="{{ old('q3_a2') }}">
  <label for="q3_a2">When did this occur (how many months ago)?</label>
  <span class="red-text text-lghten-1">{{ $errors->first('q3_a2') }}</span>
</div>