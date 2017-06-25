@extends('layouts.profile')

@section('content')
<div class="row">
  <div class="col s12 m12">
    <div class="card">
      <div class="card-content">
        <div class="row">
          <div class="col s12">
            <h4>Summary</h4>
            <div class="row">
              <div class="col s12 m12 l6">
                <div class="card">
                  <form action="{{ url('/home') }}" role="form" method="POST" id="my_goals">
                    {{ csrf_field() }}

                    <div class="card-content">
                      <span class="card-title">My goals</span>
                      <div class="input-field">
                        <i class="fa fa-thumbs-up prefix" aria-hidden="true"></i>
                        <input id="goal_1" type="text" name="goal_1" placeholder="Enter your goal here" value="{{ $data['goals'][0] }}">
                        <label for="goal_1" data-error="wrong" data-success="right">Your first goal</label>
                      </div>
                      <div class="input-field">
                        <i class="fa fa-thumbs-up prefix" aria-hidden="true"></i>
                        <input id="goal_2" type="text" name="goal_2" placeholder="Enter your goal here" value="{{ $data['goals'][1] }}">
                        <label for="goal_2" data-error="wrong" data-success="right">Your second goal</label>
                      </div>
                      <div class="input-field">
                        <i class="fa fa-thumbs-up prefix" aria-hidden="true"></i>
                        <input id="goal_3" type="text" name="goal_3" placeholder="Enter your goal here" value="{{ $data['goals'][2] }}">
                        <label for="goal_3" data-error="wrong" data-success="right">Your third goal</label>
                      </div>
                      <div class="input-field">
                        <i class="fa fa-thumbs-up prefix" aria-hidden="true"></i>
                        <input id="goal_4" type="text" name="goal_4" placeholder="Enter your goal here" value="{{ $data['goals'][3] }}">
                        <label for="goal_4" data-error="wrong" data-success="right">Your fourth goal</label>
                      </div>  
                    </div>
                    <div class="card-action">
                      <a href="#" onclick="document.getElementById('my_goals').submit();">Update your goals</a>
                    </div>
                  </form>
                </div>                
              </div>
              <div class="col s12 m12 l6">
                <ul class="collection">
                  <li class="collection-item">
                    <div class="pull-left"><i class="fa fa-calendar" aria-hidden="true"></i> <strong>Sign on date</strong> </div>
                    <div class="pull-right">{{ $data['created_at']->format('l jS \\of F Y. ') }}</div>
                    <div class="clearfix"></div>
                  </li>
                  <li class="collection-item">
                    <div class="pull-left"><i class="fa fa-calendar" aria-hidden="true"></i> <strong>Preparation week start</strong> </div>
                    <div class="pull-right">{{ $data['program_start']->format('l jS \\of F Y. ') }}</div>
                    <div class="clearfix"></div>
                  </li>
                  <li class="collection-item">
                    <div class="pull-left"><i class="fa fa-calendar" aria-hidden="true"></i> <strong>Start of week one</strong> </div>
                    <div class="pull-right">{{ $data['week_one']->format('l jS \\of F Y. ') }}</div>
                    <div class="clearfix"></div>
                  </li>
                  <li class="collection-item">
                    <div class="pull-left"><i class="fa fa-calendar" aria-hidden="true"></i> <strong>Final day of the program</strong> </div>
                    <div class="pull-right">{{ $data['last_day']->format('l jS \\of F Y. ') }}</div>
                    <div class="clearfix"></div>
                  </li>
                  <li class="collection-item">
                    <div class="pull-left"><i class="fa fa-rocket" aria-hidden="true"></i> <strong>Running tally</strong> </div>
                    <div class="pull-right">0</div>
                    <div class="clearfix"></div>
                  </li>
                  <li class="collection-item">
                    <div class="pull-left"><i class="fa fa-circle-o-notch" aria-hidden="true"></i> <strong>Overall points available</strong> </div>
                    <div class="pull-right">0</div>
                    <div class="clearfix"></div>
                  </li>
                  <li class="collection-item">
                    <div class="pull-left"><i class="fa fa-percent" aria-hidden="true"></i> <strong>Performance level</strong> </div>
                    <div class="pull-right">0%</div>
                    <div class="clearfix"></div>
                  </li>
                </ul>
                <div class="card-panel light-blue">
                  <span class="white-text card-title">
                    Adherence indicator</i>
                  </span>
                  <span class="white-text card-title">
                    <i class="fa fa-smile-o fa-2x" aria-hidden="true"></i>
                  </span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col s12 m12 l8"> 
                <div class="card">
                  <div class="card-content">
                    <span class="card-title">Track your progress</span>
                  </div>
                  <table class="striped responsive-table centered">
                    <thead>
                      <tr>
                          <th data-field="Week No.">Week No.</th>
                          <th data-field="Mon">Mon</th>
                          <th data-field="Tue">Tue</th>
                          <th data-field="Wed">Wed</th>
                          <th data-field="Thu">Thu</th>
                          <th data-field="Fri">Fri</th>
                          <th data-field="Sat">Sat</th>
                          <th data-field="Sun">Sun</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($data['calendar'] as $key=>$week)
                        <tr>
                          <td>{{ $key }}</td>
                          @foreach($week as $day)
                            <td>
                              @if($day[1] == 1) <strong class="green-text"> @endif
                                {{ $day[0] }}
                              @if($day[1] == 1) </strong> @endif
                            </td>
                          @endforeach
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col s12 m12 l4">
                <div class="card">
                  <div class="card-content">
                    <span class="card-title">Your progress</span>
                  </div>
                    <div class="collection">                      
                      @for($i=0; $i<16; $i++)
                        @if($i > $data['current_week'])
                          <div class="collection-item"">Week {{ $i }}</div>
                        @else 
                          <a href="{{url('/week-'.$i)}}" class="collection-item"">Week {{ $i }}</a>
                        @endif
                      @endfor
                    </div>
                </div>
                <div class="card-panel teal">
                  <h4 class="white-text">
                    <a href="{{ url('/challenges') }}" class="white-text">Go to challenges</a>
                  </h4>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col s12 m12 l12">
                <canvas id="chart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
