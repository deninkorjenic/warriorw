<div class="card">
  <div class="card-content">
    <div class="row">
      <div class="col s12 m8 l8">
        <span class="card-title">Challenge 1: <strong>I like to move it, move it</strong></span>
        <ul class="collection">
        @foreach($challenge_infos[0] as $challenge_info)
          <li class="collection-item">{!! $challenge_info !!}</li>
        @endforeach
        </ul>
      </div>
      <div class="col s12 m4 l4">
        <span class="card-title">Key details</span>
        <ul class="collection">
          <li class="collection-item"><strong>Start date:</strong> {{ $c1->start->date->day }}.{{ $c1->start->date->month }}.{{ $c1->start->date->year }}.
          </li>
          <li class="collection-item"><strong>End date:</strong> {{ $c1->end->date->day }}.{{ $c1->end->date->month }}.{{ $c1->end->date->year }}.</li>
          <li class="collection-item"><strong>Challenge status:</strong> 
            @if($c1->status)
              <em class="green-text">Live!</em>
            @else
              <em class="red-text">Not live yet</em>
            @endif
          </li>
          <li class="collection-item"><strong>My score:</strong> {{ $c1->points }} </li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col s12">
        <span class="card-title">My 5 ways to move more</span>
        <div class="row">
          <div class="col s12">
            <ul class="collapsible" data-collapsible="accordion">
              @foreach($c1->challenges as $key=>$challenge)
                @if($challenge !== null)
                  <li>
                    <div class="collapsible-header"><strong>{{ $key+1 }}.</strong> {{ $challenge }}</div>
                    <div class="collapsible-body grey lighten-4">
                      <table>
                        <thead>
                          <tr>
                              <th>Week 1</th>
                              <th>Week 2</th>
                              <th>Week 3</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="row">
                                @for($i=1; $i<6; $i++)
                                  <div class="col s2">
                                    <p>
                                      <input type="checkbox" id="c1_w1_{{$key}}_{{$i}}" />
                                      <label for="c1_w1_{{$key}}_{{$i}}"></label>
                                    </p>
                                  </div>
                                @endfor
                              </div>
                            </td>
                            <td>
                              <div class="row">
                                @for($i=1; $i<6; $i++)
                                  <div class="col s2">
                                    <p>
                                      <input type="checkbox" id="c1_w2_{{$key}}_{{$i}}" />
                                      <label for="c1_w2_{{$key}}_{{$i}}"></label>
                                    </p>
                                  </div>
                                @endfor
                              </div>
                            </td>
                            <td>
                              <div class="row">
                                @for($i=1; $i<6; $i++)
                                  <div class="col s2">
                                    <p>
                                      <input type="checkbox" id="c1_w3_{{$key}}_{{$i}}" />
                                      <label for="c1_w3_{{$key}}_{{$i}}"></label>
                                    </p>
                                  </div>
                                @endfor
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
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