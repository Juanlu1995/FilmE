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

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark header mb-3 ">
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
                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDM2MC44IDM2MC44IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAzNjAuOCAzNjAuODsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIyNHB4IiBoZWlnaHQ9IjI0cHgiPgo8Zz4KCTxnPgoJCTxnPgoJCQk8cmVjdCB4PSIxNDEuMiIgeT0iMjQ1LjI3IiB3aWR0aD0iOTQiIGhlaWdodD0iNDIuNCIgZmlsbD0iI0ZGRkZGRiIvPgoJCQk8cGF0aCBkPSJNMTUuNiwyOTQuNDdjMCwxOCwxNC44LDMyLjgsMzIuOCwzMi44SDMyOGMxOCwwLDMyLjgtMTQuOCwzMi44LTMyLjh2LTEyMC44SDE1LjZWMjk0LjQ3eiBNNTIuNCwyMDYuODY5SDEzMCAgICAgYzMuMiwwLDUuNiwyLjQsNS42LDUuNnMtMi40LDUuNi01LjYsNS42SDUyLjRjLTMuMiwwLTUuNi0yLjQtNS42LTUuNkM0Ni44LDIwOS42Nyw0OS4yLDIwNi44NjksNTIuNCwyMDYuODY5eiBNNTIuNCwyNDUuMjcgICAgIGMtMy4yLDAtNS42LTIuNC01LjYtNS42czIuNC01LjYsNS42LTUuNkgxMzZoMTA0LjhoODMuNmMzLjIsMCw1LjYsMi40LDUuNiw1LjZzLTIuNCw1LjYtNS42LDUuNkgyNDZ2NDIuNGg3OC40ICAgICBjMy4yLDAsNS42LDIuNCw1LjYsNS42cy0yLjQsNS42LTUuNiw1LjZoLTgzLjZIMTM2SDUyLjRjLTMuMiwwLTUuNi0yLjQtNS42LTUuNnMyLjQtNS42LDUuNi01LjZoNzh2LTQyLjRINTIuNHoiIGZpbGw9IiNGRkZGRkYiLz4KCQkJPHBvbHlnb24gcG9pbnRzPSIxNTQsMTAwLjA3IDE5OC40LDQ2LjA3IDE1MS4yLDUwLjg3IDEwNi44LDEwNC40NyAgICAiIGZpbGw9IiNGRkZGRkYiLz4KCQkJPHBvbHlnb24gcG9pbnRzPSIyMzQsOTIuMDcgMjc4LDM4LjQ3IDIzMS4yLDQyLjg3IDE4Ni44LDk2Ljg2OSAgICAiIGZpbGw9IiNGRkZGRkYiLz4KCQkJPHBhdGggZD0iTTQ2LDk2LjQ3djE0LjRsMjguNC0yLjhsNDQuNC01NGwtNzcuNiw3LjZjLTEwLDAuOC0xOC40LDYuOC0yMy4yLDE1LjJoOC44QzM3LjIsNzYuNDcsNDYsODUuMjcsNDYsOTYuNDd6IiBmaWxsPSIjRkZGRkZGIi8+CgkJCTxwYXRoIGQ9Ik0zNTkuMiw4MC4wN2wtMi0xOS4yYy0xLjYtMTYuNC0xNi40LTI4LjgtMzIuOC0yNy4ybC0xMy42LDEuMmwtNDQuNCw1NEwzNTkuMiw4MC4wN3oiIGZpbGw9IiNGRkZGRkYiLz4KCQkJPHBvbHlnb24gcG9pbnRzPSIyMDQsMTYyLjg2OSAxNTQuOCwxMTMuNjcgMTA3LjIsMTEzLjY3IDE1Ni44LDE2Mi44NjkgICAgIiBmaWxsPSIjRkZGRkZGIi8+CgkJCTxwYXRoIGQ9Ik00NiwxMTMuNjd2MTUuMmMwLDEwLjgtOC44LDE5LjYtMTkuNiwxOS42SDE1LjZ2MTQuNEgxMjRsLTQ5LjYtNDkuMkg0NnoiIGZpbGw9IiNGRkZGRkYiLz4KCQkJPHBvbHlnb24gcG9pbnRzPSIyODQsMTYyLjg2OSAyMzQuOCwxMTMuNjcgMTg3LjYsMTEzLjY3IDIzNi44LDE2Mi44NjkgICAgIiBmaWxsPSIjRkZGRkZGIi8+CgkJCTxwb2x5Z29uIHBvaW50cz0iMjY3LjYsMTEzLjY3IDMxNy4yLDE2Mi44NjkgMzYwLjgsMTYyLjg2OSAzNjAuOCwxMTMuNjcgICAgIiBmaWxsPSIjRkZGRkZGIi8+CgkJCTxwYXRoIGQ9Ik0zNCwxMjguODY5di0zMi40YzAtNC40LTMuNi03LjYtNy42LTcuNkg3LjZjLTQuNCwwLTcuNiwzLjYtNy42LDcuNnYzMi40YzAsNC40LDMuNiw3LjYsNy42LDcuNmgxOC44ICAgICBDMzAuOCwxMzYuNDcsMzQsMTMyLjg2OSwzNCwxMjguODY5eiIgZmlsbD0iI0ZGRkZGRiIvPgoJCTwvZz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K"/>
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                @auth()

                    <ul class="navbar-nav mr-auto">
                        &nbsp;

                        <li class="nav-item">
                            <a class="nav-link @if(Request::is("films/discover")) active @endif disabled"
                               href="/films/discover" >Discover</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Request::is("profile")) active @endif" href="/profile">Profile</a>
                        </li>
                        <li class="nav-item @if(Request::is("films/create")) active @endif">
                            <a class="nav-link" href="/films/create">Create</a>
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

    <div class="container mt-4">
        @yield('content')
    </div>
</div>

</body>
</html>
