@include('layouts.main.header')
<body class="grey lighten-4">
  <nav class="nav">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo"><img src="images/logo-dark.png" alt=""></a>
      <a href="#" data-activates="mobile-nav" class="button-collapse"><i class="fa fa-bars" aria-hidden="true"></i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="{{ url('/home') }}">Summary</a></li>
        <li><a href="{{ url('/challenges') }}">Challenges</a></li>
        <li><a href="#" data-activates="slide-out" class="button-collapse show-on-large">Notifications <span class="badge new white red-text">1</span></a>
      </ul>
      <ul class="side-nav" id="mobile-nav">
        <li><a href="{{ url('/home') }}">Summary</a></li>
        <li><a href="{{ url('/challenges') }}">Challenges</a></li>
        <li><a href="#" data-activates="slide-out" class="button-collapse show-on-large">Notifications <span class="badge new white red-text">1</span></a></li>
      </ul>
    </div>
  </nav>    
  <div id="app">
  <ul id="slide-out" class="side-nav">
    <li><div class="userView">
      <div class="background">
        <img src="images/notifications-bg.jpg">
      </div>
      <a href="#!name"><span class="white-text name">{{ auth()->user()->name }}</span></a>
      <a href="#!email"><span class="white-text email">{{ auth()->user()->email }}</span></a>
    </div></li>
    <li><a class="subheader">Notifications</a></li>
    <li><a href="{{ url('/week-1') }}"><i class="fa fa-star" aria-hidden="true"></i> New webinar is out</a></li>
    <li><a href="{{ url('/food-diary') }}"><i class="fa fa-star" aria-hidden="true"></i> Food diary available!</a></li>
    <li><a href="#!"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> New week started!</a></li>
    <li><div class="divider"></div></li>
    <li><a class="waves-effect" href="#!"><i class="fa fa-cog" aria-hidden="true"></i> Notification settings</a></li>
  </ul>
    <div class="container main">
      <main class="row">
        @yield('content')
      </main>
    </div>
  </div>
@include('layouts.main.footer')
