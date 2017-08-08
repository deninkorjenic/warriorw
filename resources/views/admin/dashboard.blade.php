@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
          <span class="card-title">
            Overview
          </span>
         <table class="highlight">
            <thead>
              <tr>
                  <th data-field="fname">Full Name</th>
                  <th data-field="profilec">Email</th>
                  <th data-field="programid">Program Type</th>
                  <th data-field="mob">Mobile Number</th>
                  <th data-field="pstart">Program Start</th>
                  <th data-field="pend">Last Day</th>
                  <th data-field="cweek">Current week</th>
                  <th data-field="adh">Adherence</th>
                  <th data-field="tasks">Tasks completed</th>
                  <th data-field="progress">Current total progress</th>
              </tr>
            </thead>

            <tbody>
            @foreach($users as $user)
              @if($user->finished_profile == 1 && $user->role !== 'admin')
                @include('admin.partials.user')
              @endif
            @endforeach

            </tbody>
          </table>  
        
      </div>
    </div>
  </div>
 </div> 
@endsection
