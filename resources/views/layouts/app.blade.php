@include('layouts.main.header')
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
        @include('layouts.main.footer')
