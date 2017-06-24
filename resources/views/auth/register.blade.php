@extends('layouts.auth')

@section('content')
<div class="wrapper">
  <div class="wrapper-landing"></div>
  <div class="wrapper-form signup">
    <img src="images/logo-light.png" alt="">
    <form role="form" method="POST" action="{{ url('/register') }}" class="row">
      {{ csrf_field() }}
      <div class="input-field col s12 m12">
        <label for="name">Full name</label>
        <input type="text" name="name" id="last_name" class="form-control" required>
        @if ($errors->has('last_name'))
          <span class="help-block">
            <strong>{{ $errors->first('last_name') }}</strong>
          </span>
        @endif
      </div>
      <div class="input-field col s12 m12">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
        @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif
      </div>
      <div class="input-field col s12 m6">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
        @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
      </div>
      <div class="input-field col s12 m6">
        <label for="password_confirmation">Repeat password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
      </div>
      <div class="input-field col m12 s12">
        <input type="submit" class="btn waves-effect waves-light light-blue" value="Sign up!">
      </div>
      <div class="input-field col ms12 12">
        <a href="{{ url('/login') }}">I already have an account!</a>
      </div>
    </form>
  </div>
</div>
@endsection
