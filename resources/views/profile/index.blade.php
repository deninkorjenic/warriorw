@extends('layouts.profile')

@section('content')
<div class="row">
  <div class="col s12 m12">
    <div class="card">
      <div class="card-content">
        <div class="row">
          <div class="col s12">
            <h4>Profile setup</h4>
            <form action="{{ url('/profile-setup') }}" role="form" method="POST">
              {{ csrf_field() }}
              <div class="row">
                <div class="col s12 m12">
                  <h5>Your info</h5>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 m4">
                  <input value="{{ $userInfo['name'] }}" id="name" name="name" type="text" class="validate">
                  <label for="name">Full Name</label>
                </div>
                <div class="input-field col s12 m4">
                  <input value="{{ $userInfo['email'] }}" id="email" name="email" type="text" class="validate">
                  <label for="email">Email</label>
                </div>
                <div class="input-field col s12 m4">
                  <input id="mobile_number" type="text" name="mobile_number" class="validate">
                  <label for="mobile_number">Mobile phone number</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <select id="country" name="country">
                    <option value="" disabled selected>Choose your country</option>
                    @foreach($userInfo['countries'] as $k=>$c)
                      <option value="{{ $k }}">{{ $c }}</option>
                    @endforeach
                  </select>
                  <label>Country</label>
                </div>     
                <div class="input-field col s6">
                  <select name="timezone" id="timezone">
                    <option value="" disabled selected>Choose your timezone</option>
                    @foreach($userInfo['timezone'] as $k=>$t)
                      <option value="{{ $t }}">{{ $k }}</option>
                    @endforeach
                  </select>
                  <label>Timezone</label>
                </div>          
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <input id="address_1" name="address_1" type="text" class="validate">
                  <label for="address_1">Address line 1</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="address_2" name="address_2" type="text" class="validate">
                  <label for="address_2">Address line 2</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="address_3" name="address_3" type="text" class="validate">
                  <label for="address_3">Address line 3</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s4 state hidden">
                  <select name="state" id="state">
                    <option value="" disabled selected>Choose your state</option>
                    @foreach($userInfo['us_states'] as $u) 
                      <option value="{{ $u }}">{{ $u }}</option>
                    @endforeach
                  </select>
                  <label>State</label>
                </div> 
                <div class="input-field col s6 location">
                  <input id="city" name="city" type="text" class="validate">
                  <label for="city">City</label>                    
                </div> 
                <div class="input-field col s6 location">
                  <input id="zip" name="zip" type="text" class="validate">
                  <label for="zip">ZIP Code</label>                    
                </div> 
              </div>

              <div class="row">
                <div class="input-field col s6">
                  <input id="security_question" name="security_question" type="text" class="validate">
                  <label for="security_question">Your security question</label>   
                </div>
                <div class="input-field col s6">
                  <input id="security_answer" name="security_answer" type="text" class="validate">
                  <label for="security_answer">Your answer</label>   
                </div>
              </div>
              
              <div class="row">
                <div class="col s12 m12">
                  <input type="submit" value="Continue" class="waves-effect waves-light btn">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection