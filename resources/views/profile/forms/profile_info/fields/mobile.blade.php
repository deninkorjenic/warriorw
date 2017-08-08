<div class="input-field col s12 m4">
  <input id="mobile_number" type="text" name="mobile_number" class="validate" required value="{{ old('mobile_number') }}">
  <label for="mobile_number">Mobile phone number</label>
  <span class="red-text text-lighten-1">{{ $errors->first('mobile_number') }}</span>
</div>