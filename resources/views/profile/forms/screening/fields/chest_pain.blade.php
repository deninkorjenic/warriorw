<div class="col s10 m10">
  <span class="card-title"><strong>4. </strong>Do you ever experience unexplained pains in your chest?</span>
</div>
<div class="col s2 m2">
  <div class="switch">
    <label>
      NO
      <input type="checkbox" name="q4" id="q4"
      @if( old('q4') == 'on')
        checked
      @endif
      value="{{ old('q4', 'off') }}">
      <span class="lever"></span>
      YES
    </label>
  </div>
</div>
<div class="input-field hidden col s12 m6">
  <input id="q4_a1" name="" type="text" class="validate" value="{{ old('q4_a1') }}">
  <label for="q4_a1">Please elaborate in any way you can</label>
  <span class="red-text text-lghten-1">{{ $errors->first('q4_a1') }}</span>
</div>
<div class="input-field hidden col s12 m6">
  <input id="q4_a2" name="" type="number" class="validate" value="{{ old('q4_a2') }}">
  <label for="q4_a2">When did this occur (how many months ago)?</label>
  <span class="red-text text-lghten-1">{{ $errors->first('q4_a2') }}</span> 
</div>