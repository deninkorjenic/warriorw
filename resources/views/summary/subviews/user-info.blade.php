<div class="col s12 m12 l6">
  <ul class="collection">
    <li class="collection-item">
      <div class="pull-left"><i class="fa fa-calendar" aria-hidden="true"></i> <strong>Sign on date</strong> </div>
      <div class="pull-right">{{ $created_at->format('l jS \\of F Y. ') }}</div>
      <div class="clearfix"></div>
    </li>
    <li class="collection-item">
      <div class="pull-left"><i class="fa fa-calendar" aria-hidden="true"></i> <strong>Preparation week start</strong> </div>
      <div class="pull-right">{{ $program_start->format('l jS \\of F Y. ') }}</div>
      <div class="clearfix"></div>
    </li>
    <li class="collection-item">
      <div class="pull-left"><i class="fa fa-calendar" aria-hidden="true"></i> <strong>Start of week one</strong> </div>
      <div class="pull-right">{{ $week_one->format('l jS \\of F Y. ') }}</div>
      <div class="clearfix"></div>
    </li>
    <li class="collection-item">
      <div class="pull-left"><i class="fa fa-calendar" aria-hidden="true"></i> <strong>Final day of the program</strong> </div>
      <div class="pull-right">{{ $last_day->format('l jS \\of F Y. ') }}</div>
      <div class="clearfix"></div>
    </li>
    <li class="collection-item">
      <div class="pull-left"><i class="fa fa-rocket" aria-hidden="true"></i> <strong>Running tally</strong> </div>
      <div class="pull-right">{{ $current_points }}</div>
      <div class="clearfix"></div>
    </li>
    <li class="collection-item">
      <div class="pull-left"><i class="fa fa-circle-o-notch" aria-hidden="true"></i> <strong>Overall points available</strong> </div>
      <div class="pull-right">{{ $overall_points }}</div>
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
      @if($adherence == 'normal')
        <i class="medium material-icons">sentiment_very_satisfied</i>
      @elseif($adherence == 'bad')
        <i class="medium material-icons">sentiment_dissatisfied</i>
      @else
        <i class="medium material-icons">sentiment_very_dissatisfied</i>
      @endif
    </span>
  </div>
</div>