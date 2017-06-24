<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <base href="{{URL::asset('/')}}" target="_top">

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
        <li><a href="/archive">Archive</a></li>
      </ul>
      <ul class="side-nav" id="mobile-nav">
        <li><a href="/home">Summary</a></li>
        <li><a href="/challenges">Challenges</a></li>
        <li><a href="/dashboard">Admin</a></li>
        <li><a href="/archive">Archive</a></li>
      </ul>
    </div>
  </nav>    
  <div id="app">
    <div class="container-fluid main">
      <main class="row">
        @yield('content')
      </main>
    </div>
  </div>
  <!-- Scripts 
  <script src="/js/app.js"></script> -->
  <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <script src="/js/scripter.js"></script>
  {!! MaterializeCSS::include_js() !!}
</body>
</html>
