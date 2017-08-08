@extends('layouts.profile')

@section('content')
<div class="row">
  <div class="col s12 m12">
    <div class="card">
      <div class="card-content">
        <div class="row">
          <div class="col s12">
            <h4>Pre-screening test</h4>
            @include('profile.forms.screening.form')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
