<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Komuna') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .navbar {
            background-color: darkblue;
            color: chartreuse;
            /* position: fixed;
            width: 100%;
            top: 0; */
        }

        * a:hover {
            background-color: black;
            color: white;
            text-decoration: none!important;
        }

        /* .py-4 {
            position: absolute;
            margin-top: 170px;
            float: right;

        } */

    </style>
</head>
<body>
    <div id="app">        
        {{--  <nav style="position:fixed; top:0; width:100%;" class="navbar navbar-expand-md navbar-laravel navbar-fixed-top">  --}}
        
        <nav class="navbar navbar-expand-md navbar-dark">
            <div class="container">
                @guest
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h1>{{ config('app.name', 'Komuna') }}</h1>
                </a>
                @else
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <h1>{{ config('app.name', 'Komuna') }}</h1>
                </a>
                @endguest

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    {{--  <ul class="navbar-nav mr-auto">
                        <li> <a  class="nav-link" href="/projects">Projects</a></li>
                        <li> <a  class="nav-link" href="/projects/create">Start Project</a></li>
                    </ul>  --}}

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            @component('components.who')

                            @endcomponent
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
</body>
</html>
