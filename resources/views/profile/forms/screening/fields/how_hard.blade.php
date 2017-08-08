<div class="col s12">
  <div class="row">
    <div class="col s12 m12 ">
      <span class="card-title"><strong>12. </strong>When you do work out, how hard do you work?</span>
    </div>
    <div class="col s12">
      <p>
        <input class="with-gap" name="q12" type="radio" id="q10a1" value="3" 
        @if(old('q12') == 3)
          checked
        @endif
        required>
        <label for="q10a1">I take it easy without breathing hard or sweating</label>
      </p>
      <p>
        <input class="with-gap" name="q12" type="radio" id="q10a2" value="2" 
        @if(old('q12') == 2)
          checked
        @endif
        required>
        <label for="q10a2">A little hard breathing and/or sweating</label>
      </p>
      <p>
        <input class="with-gap" name="q12" type="radio" id="q10a3" value="1" 
        @if(old('q12') == 1)
          checked
        @endif
        required>
        <label for="q10a3">I go all out</label>
      </p>
      <span class="red-text text=lighten-1">{{ $errors->first('q12') }}</span>
    </div>
  </div>
</div>