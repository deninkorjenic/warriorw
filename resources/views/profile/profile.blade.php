@extends('layouts.profile')

@section('content')
<div class="row">
  <div class="col s12 m12">
    <div class="card">
      <div class="card-content">
        <div class="row">
          <div class="col s12">
            <h4>Profile setup</h4>
            @include('profile.forms.profile_info.form')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection