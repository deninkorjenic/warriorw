<div class="input-field col s12 m4">
  <input value="{{ old('email', $userInfo['email']) }}" id="email" name="email" type="email" class="validate" required>
  <label for="email">Email</label>
  <span class="red-text text-lighten-1">{{ $errors->first('email') }}</span>
</div>