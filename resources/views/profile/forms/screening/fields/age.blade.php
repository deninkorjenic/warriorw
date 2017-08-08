<div class="col s12 m6">
    <div class="row">
        <p class="range-field col s9">
            <span class="card-title">
                <strong>
                    2.
                </strong>
                Choose your age
            </span>
            <span class="red-text text-lighten-1">{{ $errors->first('age') }}</span>
            <input id="age_slider" max="90" min="14" name="age_slider" type="range"/>
        </p>
        <div class="input-field col s3 location">
            <input class="validate" id="age" name="age" type="number" required value="{{ old('age') }}">
                <label for="age">
                    Age
                </label>
            </input>
        </div>
    </div>
</div>