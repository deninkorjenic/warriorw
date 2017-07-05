<div class="col s12 m12 l4">
  <div class="card">
    <div class="card-content">
      <span class="card-title">Your progress</span>
    </div>
      <div class="collection">
        @if(isset($program_json->weeks))
          @foreach($related_weeks as $relatedKey => $relatedId)
            @if($relatedKey > $current_week)
              <div class="collection-item"">Week {{ $relatedKey }}</div>
            @else 
              <a href="{{ url('/week-' .$relatedId) }}" class="collection-item"">Week {{ $relatedKey }}</a>
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