<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--TODO: Is this necessary?--}}
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {!! MaterializeCSS::include_css() !!}
    <link href="{{ url('/css/app.css') }}" rel="stylesheet">
    <link href="{{ url('/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!}
    </script>
</head>
<body class="grey lighten-4">
<nav class="nav">
    <div class="nav-wrapper">
        <a href="{{ url('/home') }}" class="brand-logo"><img src="{{asset('images/logo-dark.png')}}" alt=""></a>
        <a href="#" data-activates="mobile-nav" class="button-collapse"><i class="fa fa-bars" aria-hidden="true"></i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li class="active"><a href="{{ url('/weeks') }}">Weeks</a></li>
            <li><a href="{{ url('/tasks') }}">Tasks</a></li>
            <li><a href="#">Menu item 3</a></li>
            <li><a href="#">Menu item 4</a></li>
        </ul>
        <ul class="side-nav" id="mobile-nav">
            <li><a href="#">Weeks</a></li>
            <li><a href="#">Tasks</a></li>
            <li><a href="#">Menu item 3</a></li>
            <li><a href="#">Menu item 4</a></li>
        </ul>
    </div>
</nav>
<div class="row">
    <div class="col s10 push-s1 pull-s1">
        <div id="app">
            @yield('content')
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="/js/app.js"></script>
<script src="{{ url('js/scripter.js') }}"></script>
{!! MaterializeCSS::include_js() !!}
</body>
</html>
