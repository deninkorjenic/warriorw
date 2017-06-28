@extends('layouts.profile')

@section('content')
<div class="row" id="food_diary_page">
  <div class="col s12">
    <h4 class="card-title">
      4 Day Food Diary
    </h4>
    <p><strong>Directions: </strong><i>be descriptive so that quantities and extras are described. Don't leave anything out - you're only cheating yourself!</i></p>
    <hr>
    @for($i=1; $i<5; $i++)
      <h5>Day {{$i}}</h5>
      <div class="row">
        <form action="{{ url('/food-diary') }}" method="post" class="food-diary-form">
          {{ csrf_field() }}
          <input type="hidden" name="day" value="{{ $i }}">
          <input type="hidden" name="before_lunch" value="true">
          <div class="col s12 m6">
            <i>Before and including lunch</i>
            <div class="card">
              <div class="card-content">
                <div class="row">
                  <div class="col s12 m6">
                    <span class="card-title">What I ate</span>
                    @if(isset($food_diary['day_' .$i]['before_lunch']['ate']))
                      @foreach($food_diary['day_' .$i]['before_lunch']['ate'] as $value)
                        <div class="input-field">
                          <input name="ate[]" type="text" class="validate" value="{{ $value }}">
                        </div>
                      @endforeach
                    @else
                      @for($count = 1; $count < 7; $count++)
                        <div class="input-field">
                          <input name="ate[]" type="text" class="validate">
                        </div>
                      @endfor
                    @endif
                  </div>
                  <div class="col s12 m6">
                    <span class="card-title">What I drank</span>
                    @if(isset($food_diary['day_' .$i]['before_lunch']['drank']))
                      @foreach($food_diary['day_' .$i]['before_lunch']['drank'] as $value)
                        <div class="input-field">
                          <input name="drank[]" type="text" class="validate" value="{{ $value }}">
                        </div>
                      @endforeach
                    @else
                      @for($count = 1; $count < 7; $count++)
                        <div class="input-field">
                          <input name="drank[]" type="text" class="validate">
                        </div>
                      @endfor
                    @endif
                    <button class="btn waves-effect waves-light right" type="submit" name="action">Update</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        <form action="{{ url('/food-diary') }}" method="post" class="food-diary-form">
          {{ csrf_field() }}
          <input type="hidden" name="day" value="{{ $i }}">
          <input type="hidden" name="before_lunch" value="false">
          <div class="col s12 m6">
            <i>After lunch</i>
            <div class="card">
              <div class="card-content">
                <div class="row">
                  <div class="col s12 m6">
                    <span class="card-title">What I ate</span>
                    @if(isset($food_diary['day_' .$i]['after_lunch']['ate']))
                      @foreach($food_diary['day_' .$i]['after_lunch']['ate'] as $value)
                        <div class="input-field">
                          <input name="ate[]" type="text" class="validate" value="{{ $value }}">
                        </div>
                      @endforeach
                    @else
                      @for($count = 1; $count < 7; $count++)
                        <div class="input-field">
                          <input name="ate[]" type="text" class="validate">
                        </div>
                      @endfor
                    @endif
                  </div>
                  <div class="col s12 m6">
                    <span class="card-title">What I drank</span>
                    @if(isset($food_diary['day_' .$i]['after_lunch']['drank']))
                      @foreach($food_diary['day_' .$i]['after_lunch']['drank'] as $value)
                        <div class="input-field">
                          <input name="drank[]" type="text" class="validate" value="{{ $value }}">
                        </div>
                      @endforeach
                    @else
                      @for($count = 1; $count < 7; $count++)
                        <div class="input-field">
                          <input name="drank[]" type="text" class="validate">
                        </div>
                      @endfor
                    @endif
                    <button class="btn waves-effect waves-light right" type="submit" name="action">Update</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    @endfor
  </div>
 </div>
@endsection
