<div class="card">
  <div class="card-content">
    <div class="row">
      <div class="col s12 m8 l8">
        <span class="card-title">Challenge 2: <strong>Warriors just wanna have fun</strong></span>
        <ul class="collection">
        @foreach($challenge_infos[1] as $challenge_info)
          <li class="collection-item">{!! $challenge_info !!}</li>
        @endforeach
        </ul>
      </div>
      <div class="col s12 m4 l4">
        <span class="card-title">Key details</span>
        <ul class="collection">
          <li class="collection-item"><strong>Start date:</strong> {{ $c2->start->date->day }}.{{ $c2->start->date->month }}.{{ $c2->start->date->year }}.
          </li>
          <li class="collection-item"><strong>End date:</strong> {{ $c2->end->date->day }}.{{ $c2->end->date->month }}.{{ $c2->end->date->year }}.</li>
          <li class="collection-item"><strong>Challenge status:</strong> 
            @if($c2->status)
              <em class="green-text">Live!</em>
            @else
              <em class="red-text">Not live yet</em>
            @endif
          </li>
          <li class="collection-item"><strong>My score:</strong> {{ $c2->points }} </li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col s12">
        <span class="card-title">Leisure activity I did</span>
        <div class="row">
          <div class="col s12">
          <ul class="collection">
              @foreach($c2->challenges as $key=>$challenge)
                @if($challenge !== null)
                  <li class="collection-item"><strong>{{ $k+1 }}. </strong>{{ $c }}
                  </li>
                @endif
              @endforeach
          </ul>                 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>