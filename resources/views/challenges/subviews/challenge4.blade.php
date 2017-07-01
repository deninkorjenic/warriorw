<div class="card">
  <div class="card-content">
    <div class="row">
      <div class="col s12 m8 l8">
        <span class="card-title">Challenge 4: <strong>Sleeping beauty</strong></span>
        <ul class="collection">
        @foreach($challenge_infos[3] as $challenge_info)
          <li class="collection-item">{!! $challenge_info !!}</li>
        @endforeach
        </ul>
      </div>
      <div class="col s12 m4 l4">
        <span class="card-title">Key details</span>
        <ul class="collection">
          <li class="collection-item"><strong>Start date:</strong> {{ $c4->start->date->day }}.{{ $c4->start->date->month }}.{{ $c4->start->date->year }}.
          </li>
          <li class="collection-item"><strong>End date:</strong> {{ $c4->end->date->day }}.{{ $c4->end->date->month }}.{{ $c4->end->date->year }}.</li>
          <li class="collection-item"><strong>Challenge status:</strong> 
            @if($c4->status)
              <em class="green-text">Live!</em>
            @else
              <em class="red-text">Not live yet</em>
            @endif
          </li>
          <li class="collection-item"><strong>My score:</strong> {{ $c4->points }} </li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col s12">
        <span class="card-title">Leisure activity I did</span>
        <div class="row">
          <div class="col s12">
            <ul class="collapsible" data-collapsible="accordion">
                @foreach($habits[1] as $key => $habit)
                  <li>
                    <div class="collapsible-header">{!! $habit !!}</div>
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
                              <div class="row" style="margin-bottom: 0;">
                                @for($i=1; $i<2; $i++)
                                  <div class="col s12">
                                    <input type="checkbox" id="c2_w1_{{$key}}_{{$i}}" disabled="disabled" />
                                    <label for="c1_w3_{{$key}}_{{$i}}">Week 1</label>
                                  </div>
                                @endfor
                              </div>
                            </td>
                            <td>
                              <div class="row" style="margin-bottom: 0;">
                                @for($i=1; $i<2; $i++)
                                  <div class="col s12">
                                    <input type="checkbox" id="c2_w2_{{$key}}_{{$i}}" disabled="disabled" />
                                    <label for="c1_w3_{{$key}}_{{$i}}">Week 2</label>
                                  </div>
                                @endfor
                              </div>
                            </td>
                            <td>
                              <div class="row" style="margin-bottom: 0;">
                                @for($i=1; $i<2; $i++)
                                  <div class="col s12">
                                    <input type="checkbox" id="c2_w3_{{$key}}_{{$i}}" disabled="disabled" />
                                    <label for="c1_w3_{{$key}}_{{$i}}">Week 3</label>
                                  </div>
                                @endfor
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </li>
                @endforeach
            </ul>                  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>