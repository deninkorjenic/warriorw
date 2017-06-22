<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {!! MaterializeCSS::include_css() !!}
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/font-awesome.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="grey lighten-4">
  <nav class="nav">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo"><img src="images/logo-dark.png" alt=""></a>
      <a href="#" data-activates="mobile-nav" class="button-collapse"><i class="fa fa-bars" aria-hidden="true"></i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="/home">Summary</a></li>
        <li><a href="/challenges">Challenges</a></li>
        <li><a href="/dashboard">Admin</a></li>
        <li><a href="#" data-activates="slide-out" class="button-collapse show-on-large">Notifications <span class="badge new white red-text">1</span></a>
      </ul>
      <ul class="side-nav" id="mobile-nav">
        <li><a href="/home">Summary</a></li>
        <li><a href="/challenges">Challenges</a></li>
        <li><a href="/dashboard">Admin</a></li>
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
    <li><a href="/week-1"><i class="fa fa-star" aria-hidden="true"></i> New webinar is out</a></li>
    <li><a href="/food-diary"><i class="fa fa-star" aria-hidden="true"></i> Food diary available!</a></li>
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
  <!-- Scripts -->
  <script src="/js/app.js"></script>
  {!! MaterializeCSS::include_js() !!}
</body>
</html>
