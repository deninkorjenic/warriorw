@extends('layouts.profile')

@section('content')
<div class="row">
  <div class="col s12 m12">
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
                    @foreach($c1->challenges as $k=>$c)
                      <li>
                        <div class="collapsible-header"><strong>{{ $k+1 }}.</strong> {{ $c }}</div>
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
                                        <input type="checkbox" id="c1_w3_{{$i}}" />
                                        <label for="c1_w3_{{$i}}"></label>
                                      </div>
                                    @endfor
                                  </div>
                                </td>
                                <td>
                                  <div class="row">
                                    @for($i=1; $i<6; $i++)
                                      <div class="col s2">
                                        <input type="checkbox" id="c1_w2_{{$i}}" />
                                        <label for="c1_w2_{{$i}}"></label>
                                      </div>
                                    @endfor
                                  </div>
                                </td>
                                <td>
                                  <div class="row">
                                    @for($i=1; $i<6; $i++)
                                      <div class="col s2">
                                        <input type="checkbox" id="c1_w3_{{$i}}" />
                                        <label for="c1_w3_{{$i}}"></label>
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
                    @foreach($c2->challenges as $k=>$c)
                      <li class="collection-item"><strong>{{ $k+1 }}. </strong>{{ $c }}
                      </li>
                    @endforeach
                </ul>                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-content">
          <div class="row">
            <div class="col s12 m8 l8">
              <span class="card-title">Challenge 3: <strong>7 heavenly habits</strong></span>
              <ul class="collection">
              @foreach($challenge_infos[2] as $challenge_info)
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
                  <ul class="collapsible" data-collapsible="accordion">

                    @foreach($habits[0] as $habit)
                      <li>
                        <div class="collapsible-header">{!! $habit !!}</div>
                        <div class="collapsible-body grey lighten-4">
                          <table>
<!--                             <thead>
                              <tr>
                                  <th>Week 1</th>
                                  <th>Week 2</th>
                                  <th>Week 3</th>
                                  <th>Week 4</th>
                                  <th>Week 5</th>
                              </tr>
                            </thead> -->
                            <tbody>
                              <tr>
                                <td>
                                  <div class="row" style="margin-bottom: 0;">
                                    @for($i=1; $i<2; $i++)
                                      <div class="col s12">
                                        <input type="checkbox" id="c2_w3_{{$i}}" disabled="disabled" />
                                        <label for="c1_w3_{{$i}}">Week 1</label>
                                      </div>
                                    @endfor
                                  </div>
                                </td>
                                <td>
                                  <div class="row" style="margin-bottom: 0;">
                                    @for($i=1; $i<2; $i++)
                                      <div class="col s12">
                                        <input type="checkbox" id="c2_w3_{{$i}}" disabled="disabled" />
                                        <label for="c1_w3_{{$i}}">Week 2</label>
                                      </div>
                                    @endfor
                                  </div>
                                </td>
                                <td>
                                  <div class="row" style="margin-bottom: 0;">
                                    @for($i=1; $i<2; $i++)
                                      <div class="col s12">
                                        <input type="checkbox" id="c2_w3_{{$i}}" disabled="disabled" />
                                        <label for="c1_w3_{{$i}}">Week 3</label>
                                      </div>
                                    @endfor
                                  </div>
                                </td>
                                <td>
                                  <div class="row" style="margin-bottom: 0;">
                                    @for($i=1; $i<2; $i++)
                                      <div class="col s12">
                                        <input type="checkbox" id="c2_w3_{{$i}}" disabled="disabled" />
                                        <label for="c1_w3_{{$i}}">Week 4</label>
                                      </div>
                                    @endfor
                                  </div>
                                </td>
                                <td>
                                  <div class="row" style="margin-bottom: 0;">
                                    @for($i=1; $i<2; $i++)
                                      <div class="col s12">
                                        <input type="checkbox" id="c2_w3_{{$i}}" disabled="disabled" />
                                        <label for="c1_w3_{{$i}}">Week 5</label>
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
  </div>
</div>
@endsection