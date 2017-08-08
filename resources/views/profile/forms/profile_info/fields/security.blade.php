<div class="input-field col s6">
  <input id="security_question" name="security_question" type="text" class="validate" required value="{{ old('security_question') }}">
  <label for="security_question">Your security question</label>   
  <span class="red-text text-lighten-1">{{ $errors->first('security_question') }}</span>
</div>
<div class="input-field col s6">
  <input id="security_answer" name="security_answer" type="text" class="validate" required value="{{ old('security_answer') }}">
  <label for="security_answer">Your answer</label>
  <span class="red-text text-lighten-1">{{ $errors->first('security_answer') }}</span>
</div>