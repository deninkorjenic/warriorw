<div class="col s12 m12 l4">
  <div class="card">
    <div class="card-content">
      <span class="card-title">Your progress</span>
    </div>
      <div class="collection">
        @if(isset($data['program_json']->weeks))
          @foreach($data['program_json']->weeks as $key => $week)
            @if($key > $data['current_week'])
              <div class="collection-item"">Week {{ $week->week_number }}</div>
            @else 
              <a href="{{url('/week-'.$week->id)}}" class="collection-item"">Week {{ $week->week_number }}</a>
            @endif
          @endforeach
        @endif
      </div>
  </div>
  <div class="card-panel teal">
    <h4 class="white-text">
      <a href="{{ url('/challenges') }}" class="white-text">Go to challenges</a>
    </h4>
  </div>
</div>