<form action="{{ url('/profile-setup') }}" role="form" method="POST">
  {{ csrf_field() }}
  <div class="row">
    <div class="col s12 m12">
      <h5>Your info</h5>
    </div>
  </div>
  <div class="row">
    @include('profile.forms.profile_info.fields.name')
    @include('profile.forms.profile_info.fields.email')
    @include('profile.forms.profile_info.fields.mobile')
  </div>
  <div class="row">
    @include('profile.forms.profile_info.fields.country')    
    @include('profile.forms.profile_info.fields.timezone')         
  </div>

  @include('profile.forms.profile_info.fields.addresses')
  
  <div class="row">
    
    @include('profile.forms.profile_info.fields.state')
    @include('profile.forms.profile_info.fields.city')
    @include('profile.forms.profile_info.fields.zip')
     
  </div>

  <div class="row">
    @include('profile.forms.profile_info.fields.security')
  </div>
  
  <div class="row">
    <div class="col s12 m12">
      <input type="submit" value="Continue" class="waves-effect waves-light btn">
    </div>
  </div>
</form>