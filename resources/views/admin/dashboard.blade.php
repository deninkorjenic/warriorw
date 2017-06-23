@extends('layouts.dashgrid')

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
            @foreach($user as $u) 
              <tr>
                <td>{{ $u->name }}</td>             
               {{--  @if ($u->finished_profile = 0) 
                  <td>No</td>
                @else
                  <td>Yes</td>
                @endif  --}}
                <td>{{ $u->email }}</td>
                <td>1</td>
                <td>{{ $u->mobile_number }}</td>
                <td>{{ $u->program_start }}</td>
                <td>{{ $u->last_day }}</td>
                <td>3</td>
                <td><i class="fa fa-smile-o fa-2x" aria-hidden="true"></i></td>
                <td>6/100</td>
                <td>10%</td>
              </tr>
            @endforeach

            </tbody>
          </table>  
        
      </div>
    </div>
  </div>
 </div> 
@endsection
