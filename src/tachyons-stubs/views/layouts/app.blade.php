<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="pa3 pa4-ns">
            <a class="link dim black b f6 f5-ns dib mr3" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            @guest
                <a class="link dim gray f6 f5-ns dib mr3" href="{{ route('login') }}" title="Login">Login</a>
                <a class="link dim gray f6 f5-ns dib mr3" href="{{ route('register') }}" title="Register">Register</a>
            @else
                <a class="link dim black b f6 f5-ns dib mr3" href="#">
                    {{ Auth::user()->name }}
                </a>
                <a class="link dim gray f6 f5-ns dib mr3"
                   href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                >
                    Logout
                </a>
            @endguest
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
