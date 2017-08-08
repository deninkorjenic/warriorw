<div class="input-field col s6 location">
  <input id="city" name="city" type="text" class="validate" required value="{{ old('city') }}">
  <label for="city">City</label>
  <span class="red-text text-lighten-1">{{ $errors->first('city') }}</span>
</div> 