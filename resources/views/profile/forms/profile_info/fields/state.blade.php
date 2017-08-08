<div class="input-field col s4 state hidden">
  <select name="state" id="state" value="{{ old('state') }}">
    <option value="" disabled selected>Choose your state</option>
    @foreach($userInfo['us_states'] as $value => $state) 
      <option value="{{ $value }}">{{ $state }}</option>
    @endforeach
  </select>
  <label>State</label>
  <span class="red-text text-lighten-1">{{ $errors->first('state') }}</span>
</div> 