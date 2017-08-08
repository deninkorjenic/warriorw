<div class="col s10 m10">
  <span class="card-title"><strong>6. </strong>Have you had an asthma attack requiring immediate medical attention at any time over the last 12 months?</span>
</div>
<div class="col s2 m2">
  <div class="switch">
    <label>
      NO
      <input type="checkbox" name="q6" id="q6"
      @if( old('q6') == 'on')
        checked
      @endif
      value="{{ old('q6', 'off') }}">
      <span class="lever"></span>
      YES
    </label>
  </div>
</div>
<div class="input-field hidden col s12 m6">
  <input id="q6_a1" name="" type="text" class="validate" value="{{ old('q6_a1') }}">
  <label for="q6_a1">Please elaborate in any way you can</label>
  <span class="red-text text-lghten-1">{{ $errors->first('q6_a1') }}</span>
</div>
<div class="input-field hidden col s12 m6">
  <input id="q6_a2" name="" type="number" class="validate" value="{{ old('q6_a2') }}">
  <label for="q6_a2">When did this occur (how many months ago)?</label>
  <span class="red-text text-lghten-1">{{ $errors->first('q6_a2') }}</span>
</div>