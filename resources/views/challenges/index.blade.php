@extends('layouts.profile')

@section('content')
<div class="row">
  <div class="col s12 m12">
    @include('challenges.subviews.challenge1')
    @include('challenges.subviews.challenge2')
    @include('challenges.subviews.challenge3')
    @include('challenges.subviews.challenge4')
  </div>
</div>
@endsection