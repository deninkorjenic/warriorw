<div class="col s10 m10">
  <span class="card-title"><strong>7. </strong>Have you had trouble controlling your blood glucose in the last 3 months? (with or without diagnosed type I or II diabetes)</span>
</div>
<div class="col s2 m2">
  <div class="switch">
    <label>
      NO
      <input type="checkbox" name="q7" id="q7"
      @if( old('q7') == 'on')
        checked
      @endif
      value="{{ old('q7', 'off') }}">
      <span class="lever"></span>
      YES
    </label>
  </div>
</div>
<div class="input-field hidden col s12 m6">
  <input id="q7_a1" name="" type="text" class="validate" value="{{ old('q7_a1') }}">
  <label for="q7_a1">Please elaborate in any way you can</label> 
  <span class="red-text text-lghten-1">{{ $errors->first('q7_a1') }}</span>
</div>
<div class="input-field hidden col s12 m6">
  <input id="q7_a2" name="" type="number" class="validate" value="{{ old('q7_a2') }}">
  <label for="q7_a2">When did this occur (how many months ago)?</label>
  <span class="red-text text-lghten-1">{{ $errors->first('q7_a2') }}</span> 
</div>