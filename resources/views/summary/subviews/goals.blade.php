<div class="col s12 m12 l6">
  <div class="card">
    <form action="{{ url('/home') }}" role="form" method="POST" id="my_goals">
      {{ csrf_field() }}

      <div class="card-content">
        <span class="card-title">My goals</span>
        <div class="input-field">
          <i class="fa fa-thumbs-up prefix" aria-hidden="true"></i>
          <input id="goal_1" type="text" name="goal_1" placeholder="Enter your goal here" value="{{ $goals[0] }}">
          <label for="goal_1" data-error="wrong" data-success="right">Your first goal</label>
        </div>
        <div class="input-field">
          <i class="fa fa-thumbs-up prefix" aria-hidden="true"></i>
          <input id="goal_2" type="text" name="goal_2" placeholder="Enter your goal here" value="{{ $goals[1] }}">
          <label for="goal_2" data-error="wrong" data-success="right">Your second goal</label>
        </div>
        <div class="input-field">
          <i class="fa fa-thumbs-up prefix" aria-hidden="true"></i>
          <input id="goal_3" type="text" name="goal_3" placeholder="Enter your goal here" value="{{ $goals[2] }}">
          <label for="goal_3" data-error="wrong" data-success="right">Your third goal</label>
        </div>
        <div class="input-field">
          <i class="fa fa-thumbs-up prefix" aria-hidden="true"></i>
          <input id="goal_4" type="text" name="goal_4" placeholder="Enter your goal here" value="{{ $goals[3] }}">
          <label for="goal_4" data-error="wrong" data-success="right">Your fourth goal</label>
        </div>  
      </div>
      <div class="card-action">
        <a href="#" onclick="document.getElementById('my_goals').submit();">Update your goals</a>
      </div>
    </form>
  </div>                
</div>