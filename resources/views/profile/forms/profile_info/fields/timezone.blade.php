<div class="input-field col s6">
  <select name="timezone" id="timezone" required value="{{ old('timezone') }}">
    <option value="" disabled selected>Choose your timezone</option>
    @foreach($userInfo['timezone'] as $id => $timezone)
      <option value="{{ $timezone }}">{{ $timezone }}</option>
    @endforeach
  </select>
  <label>Timezone</label>
  <span class="red-text text-lighten-1">{{ $errors->first('timezone') }}</span>
</div> 