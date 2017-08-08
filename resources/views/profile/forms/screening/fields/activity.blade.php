<div class="col s12">
  <div class="row">
    <div class="col s12 m12 ">
      <span class="card-title"><strong>13. </strong>What kind of physical activities do you enjoy most? </span>
    </div>
    <div class="input-field col s12">
      <select multiple name="q13[]" id="q13" required>
        <option value="" disabled selected>Tick at least one, and up 5 boxes</option>
        @foreach($activities as $activity)
            <option value="{{ $activity->value }}"
              @if(is_array(old('q13')))
                @if(in_array($activity->value, old('q13')))
                    selected
                @endif
              @endif>
            {{ $activity->name }}</option>
        @endforeach
      </select>
      <div class="input-field hidden col s12 m6 q13-other">
        <input id="q13_a" name="q13_a" type="text" class="validate" value="{{ old('q13_a') }}">
        <label for="q13_a">Please enter what sport/activity do you prefer</label> 
        <span class="red-text text=lighten-1">{{ $errors->first('q13_a') }}</span>
      </div>
    </div>
  </div>
</div>