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
                <li class="collection-item">1. List 5 ways to increase movement in your everyday life. You can use examples provided in the Physical Activity Guide if they apply to you. They needn't be big things - in fact the smaller and seemingly more trivial the better.
                </li>
                <li class="collection-item">2. Begin implementing all of them immediately.</li>
                <li class="collection-item">3. To complete the challenge, write the things you'll do into the form on the right. Give yourself a tick each time you do this thing. Aim for 5 ticks for each item per week for 3 consecutive weeks to achieve full points.</li>
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
                <li class="collection-item">1. Do at least one leisure based activity, which takes at least 45 minutes, per week for 5 weeks</li>
                <li class="collection-item">2. Write in the activity that you did (or don't type anything if you didn't do an activity)</li>
                <li class="collection-item">3. Each activity scores you points. Here's the catch: do not write anything if you thought you weren't properly "in the moment" (e.g. distracted by work, your phone etc). Be honest with yourself!</li>
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
                <li class="collection-item">1. To the right are 7 of the best habits for sustainable lifelong god nutrition. Getting into a routine and making these kinds of habits second nature is critical.</li>
                <li class="collection-item">2. Aim to stick to all 7 habits for each of the 5 weeks of this challenge.</li>
                <li class="collection-item">3. Add a tick in the box for each week that you met the habit.</li>
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

                    @foreach($c3 as $k=>$c)
                      <li>
                        <div class="collapsible-header"><strong>{{ $k+1 }}. </strong>{{ $c }}</div>
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