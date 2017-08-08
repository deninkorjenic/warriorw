<div class="input-field col s12 m4">
  <input value="{{ old('name', $userInfo['name']) }}" id="name" name="name" type="text" class="validate" required>
  <label for="name">Full Name</label>
  <span class="red-text text-lighten-1">{{ $errors->first('name') }}</span>
</div>