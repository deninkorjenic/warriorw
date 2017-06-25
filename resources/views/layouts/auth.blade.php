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
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
    <link href="{{ url('css/font-awesome.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="auth">
    @yield('content')
    <!-- Scripts -->
    <script src="{{ url('/js/app.js') }}"></script>
    <script src="{{ url('js/scripter.js') }}"></script>
    {!! MaterializeCSS::include_js() !!}
</body>
</html>
