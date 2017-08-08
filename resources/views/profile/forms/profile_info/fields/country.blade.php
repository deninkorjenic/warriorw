<div class="input-field col s6">
  <select id="country" name="country" required value="{{ old('country') }}">
    <option value="" disabled selected>Choose your country</option>
    @foreach($userInfo['countries'] as $k=>$c)
      <option value="{{ $k }}">{{ $c }}</option>
    @endforeach
  </select>
  <label>Country</label>
  <span class="red-text text-lighten-1">{{ $errors->first('country') }}</span>
</div> 