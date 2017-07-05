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
        @foreach($calendar as $key=>$week)
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