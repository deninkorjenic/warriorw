@extends('layouts.auth')

@section('content')
<div class="wrapper">
  <div class="wrapper-landing"></div>
  <div class="wrapper-form">
    <img src="images/logo-light.png" alt="">
    <form role="form" method="POST" action="{{ url('/login') }}">
      {{ csrf_field() }}
      <div class="input-field{{ $errors->has('email') ? ' has-error' : '' }}"">
        <label for="email">E-mail Address</label>
        <input type="text" name="email" id="email" class="form-control">
          @if ($errors->has('email'))
            <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
      </div>
      <div class="input-field{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
        @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
      </div>
      <p>
        <input type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }} />
        <label for="remember">Remember Me</label>
      </p>
      <div class="input-field">
        <input type="submit" class="btn waves-effect waves-light light-blue">
      </div>
      <div class="input-field">
        <a href="{{ url('/password/reset') }}">I forgot my password</a>
      </div>
      <div class="input-field">
        <a href="{{ url('/register') }}">Sign up!</a>
      </div>
    </form>
  </div>
</div>
@endsection
