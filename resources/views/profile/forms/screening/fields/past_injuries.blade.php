<div class="col s10 m10">
  <span class="card-title"><strong>8. </strong>Do you have any muscle, bone or joint problems, past injuries or pain that may limit your ability to undertake certain exercises?</span>
</div>
<div class="col s2 m2">
  <div class="switch">
    <label>
      NO
      <input type="checkbox" name="q8" id="q8"
      @if( old('q8') == 'on')
        checked
      @endif
      value="{{ old('q8', 'off') }}">
      <span class="lever"></span>
      YES
    </label>
  </div>
</div>
<div class="input-field hidden col s12 m6">
  <input id="q8_a1" name="" type="text" class="validate" value="{{ old('q8_a1') }}">
  <label for="q8_a1">Please elaborate in any way you can</label> 
  <span class="red-text text-lghten-1">{{ $errors->first('q8_a1') }}</span>
</div>
<div class="input-field hidden col s12 m6">
  <input id="q8_a2" name="" type="text" class="validate" value="{{ old('q8_a2') }}">
  <label for="q8_a2">When did this occur (how many months ago)?</label>
  <span class="red-text text-lghten-1">{{ $errors->first('q8_a2') }}</span> 
</div>