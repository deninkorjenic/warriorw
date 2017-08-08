@include('layouts.main.header')
<body class="grey lighten-4">
    @include('layouts.main.navbar.navbar_admin')
    <div class="row">
        <div class="col s10 push-s1 pull-s1">
            <div id="app">
                @yield('content')
            </div>
        </div>
    </div>
    @include('layouts.main.footer')
</body>