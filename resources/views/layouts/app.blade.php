<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chess.js/0.10.2/chess.js" defer></script>
    <script src="https://kit.fontawesome.com/c3f33bd535.js"></script>
    <script src="{{ asset('js/chessboard-0.3.0.min.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/game.js') }}" defer></script>
    <script src="{{ asset('js\clock.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/chessboard-0.3.0.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/clock.css') }}">



    <script>
        window.Laravel = {!! json_encode([
            'csrfToken'=> csrf_token(),
            'user'=> [
                'authenticated' => auth()->check(),
                'id' => auth()->check() ? auth()->user()->id : null,
                'name' => auth()->check() ? auth()->user()->name : null,
                'muted' => auth()->check() ? auth()->user()->status == 2 ? true : false : false,
                ]
            ])
        !!};
    </script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Chessclans') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <a class="nav-link" href="/analyse">Analyse Game</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/ranking">Ranking</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/tutorials">Tutorials</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/chat">Chat</a>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if (auth()->user()->profile_image)
                                <img src="{{ asset(auth()->user()->profile_image) }}" style="width: 40px; height: 40px; border-radius: 50%;">
                                @endif
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" role="menu">
                                @if (Auth::guard('admin')->check())

                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Profile</a>

                                <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                @else
                                <a class="dropdown-item" href="{{ route('profile.myprofile') }}">Profile</a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('report.bug') }}" >{{ __('Report Bug') }} </a>
                                @endif
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
