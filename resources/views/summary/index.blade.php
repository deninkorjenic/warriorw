@extends('layouts.profile')

@section('content')
<div class="row">
  <div class="col s12 m12">
    <div class="card">
      <div class="card-content">
        <div class="row">
          <div class="col s12">
            <h4>Summary</h4>
            <div class="row">
              @include('summary.subviews.goals')
              @include('summary.subviews.user-info')
            </div>
            <div class="row">
              @include('summary.subviews.progress')
              @include('summary.weeks-sidebar')
            </div>
            <div class="row">
              <div class="col s12 m12 l12">
                <canvas id="chart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
