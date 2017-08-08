@for($i = 1; $i <= 3; $i++)
  <div class="row">
    <div class="input-field col s12">
      <input id="address_{{ $i }}" name="address_{{ $i }}" type="text" class="validate" 
      @if($i == 1) required @endif
      value="{{ old('address_' . $i) }}">
      <label for="address_"{{ $i }}>Address line {{ $i }}</label>
      <span class="red-text text-lighten-1">{{ $errors->first('address_' . $i) }}</span>
    </div>
  </div>
@endfor