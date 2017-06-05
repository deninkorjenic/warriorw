@if (Session::has('message'))
    <div class="card-panel teal lighten-2 js-hide">{{ Session::get('message') }} <span class="pull-right close-button js-close">X</span></div>
@endif
