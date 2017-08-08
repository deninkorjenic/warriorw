<div class="input-field col s6 location">
  <input id="zip" name="zip" type="number" class="validate" required value="{{ old('zip') }}">
  <label for="zip">ZIP Code</label>
  <span class="red-text text-lighten-1">{{ $errors->first('zip') }}</span>
</div>