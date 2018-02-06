<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://image.flaticon.com/icons/png/128/83/83519.png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')


</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark header">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                @auth()

                    <ul class="navbar-nav mr-auto">
                        &nbsp;
                        {{--@todo bloquear a usuarios no logueados--}}

                        <li class="nav-item">
                            {{--@todo arreglar active span--}}
                            <a class="nav-link" href="/films/discover">Discover @if(Request::is("/films/discover"))<span
                                        class="sr-only">(current)</span>@endif</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/profile">Profile @if(Request::is("/profile"))<span
                                        class="sr-only">(current)</span>@endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/films/create">Create @if(Request::is("/films/create"))<span
                                        class="sr-only">(current)</span>@endif
                            </a>
                        </li>
                    </ul>
            @endauth
            <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>

        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</div>

</body>
</html>
