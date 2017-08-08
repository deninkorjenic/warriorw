<form action="{{ url('/screening-test') }}" role="form" method="POST">
  {{ csrf_field() }}
  <div class="row">
    @include('profile.forms.screening.fields.gender')
    @include('profile.forms.screening.fields.age')
  </div>
  <div class="row q3">
    @include('profile.forms.screening.fields.heart')
  </div>


  <div class="row q4">
    @include('profile.forms.screening.fields.chest_pain')
  </div>

  <div class="row q5">
    @include('profile.forms.screening.fields.faint')
  </div>

  <div class="row q6">
    @include('profile.forms.screening.fields.asthma')
  </div>

  <div class="row q7">
    @include('profile.forms.screening.fields.glucose')
  </div>

  <div class="row q8">
    @include('profile.forms.screening.fields.past_injuries')
  </div>

  <div class="row">
    @include('profile.forms.screening.fields.waists')
  </div>
  
  <div class="row">
    @include('profile.forms.screening.fields.heart_rate')
  </div>

  <div class="row">
    @include('profile.forms.screening.fields.exercise')
  </div>

  <div class="row">
    @include('profile.forms.screening.fields.how_hard')
  </div>

  <div class="row">
    @include('profile.forms.screening.fields.activity')
  </div>

  <div class="row">
    <div class="col s12 m12">
      <input type="submit" value="Finish" class="waves-effect waves-light btn">
    </div>
  </div>              
</form>