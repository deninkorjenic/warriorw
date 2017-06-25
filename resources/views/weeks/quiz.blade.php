@extends('layouts.profile')

@section('content')
<div class="row">
  <div class="col s12">
    <h4>Revision quiz {{ $number }}</h4>
    <div class="card">
      <div class="card-content">
        <span class="card-title">
        </span>

        @foreach($quiz as $r)
          <div class="row">
            <div class="col s12 m8">
              <p>{{ $r->question }}</p>
            </div>
            <div class="col s12 m4">
              <div class="row">
                <div class="input-field col s12">
                  <select multiple>
                    <option value="" disabled selected>Pick your answers</option>
                    @foreach($r->answers as $a)
                      <option value="{{ $a[1] }}">{{ $a[0] }}</option>
                    @endforeach
                  </select>
                  <label></label>
                </div>              
              </div>
            </div>
          </div>
        @endforeach
  
      </div>
    </div>

  </div>
 </div> 
@endsection
