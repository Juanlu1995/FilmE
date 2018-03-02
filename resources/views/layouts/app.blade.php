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
                               href="/films/discover">Discover</a>
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

    <div id="content" class="container mt-4 mb-5">
        @yield('content')
    </div>

</div>
<footer class="footer mt-4 align-content-end">
    <nav class="container-fluid navbar-nav bg-dark py-3">
        <div class="container">
            <div class="row">
                <div class="col-2 align-self-center">
                    <a href="/"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDM2MC44IDM2MC44IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAzNjAuOCAzNjAuODsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIxMjhweCIgaGVpZ2h0PSIxMjhweCI+CjxnPgoJPGc+CgkJPGc+CgkJCTxyZWN0IHg9IjE0MS4yIiB5PSIyNDUuMjciIHdpZHRoPSI5NCIgaGVpZ2h0PSI0Mi40IiBmaWxsPSIjRkZGRkZGIi8+CgkJCTxwYXRoIGQ9Ik0xNS42LDI5NC40N2MwLDE4LDE0LjgsMzIuOCwzMi44LDMyLjhIMzI4YzE4LDAsMzIuOC0xNC44LDMyLjgtMzIuOHYtMTIwLjhIMTUuNlYyOTQuNDd6IE01Mi40LDIwNi44NjlIMTMwICAgICBjMy4yLDAsNS42LDIuNCw1LjYsNS42cy0yLjQsNS42LTUuNiw1LjZINTIuNGMtMy4yLDAtNS42LTIuNC01LjYtNS42QzQ2LjgsMjA5LjY3LDQ5LjIsMjA2Ljg2OSw1Mi40LDIwNi44Njl6IE01Mi40LDI0NS4yNyAgICAgYy0zLjIsMC01LjYtMi40LTUuNi01LjZzMi40LTUuNiw1LjYtNS42SDEzNmgxMDQuOGg4My42YzMuMiwwLDUuNiwyLjQsNS42LDUuNnMtMi40LDUuNi01LjYsNS42SDI0NnY0Mi40aDc4LjQgICAgIGMzLjIsMCw1LjYsMi40LDUuNiw1LjZzLTIuNCw1LjYtNS42LDUuNmgtODMuNkgxMzZINTIuNGMtMy4yLDAtNS42LTIuNC01LjYtNS42czIuNC01LjYsNS42LTUuNmg3OHYtNDIuNEg1Mi40eiIgZmlsbD0iI0ZGRkZGRiIvPgoJCQk8cG9seWdvbiBwb2ludHM9IjE1NCwxMDAuMDcgMTk4LjQsNDYuMDcgMTUxLjIsNTAuODcgMTA2LjgsMTA0LjQ3ICAgICIgZmlsbD0iI0ZGRkZGRiIvPgoJCQk8cG9seWdvbiBwb2ludHM9IjIzNCw5Mi4wNyAyNzgsMzguNDcgMjMxLjIsNDIuODcgMTg2LjgsOTYuODY5ICAgICIgZmlsbD0iI0ZGRkZGRiIvPgoJCQk8cGF0aCBkPSJNNDYsOTYuNDd2MTQuNGwyOC40LTIuOGw0NC40LTU0bC03Ny42LDcuNmMtMTAsMC44LTE4LjQsNi44LTIzLjIsMTUuMmg4LjhDMzcuMiw3Ni40Nyw0Niw4NS4yNyw0Niw5Ni40N3oiIGZpbGw9IiNGRkZGRkYiLz4KCQkJPHBhdGggZD0iTTM1OS4yLDgwLjA3bC0yLTE5LjJjLTEuNi0xNi40LTE2LjQtMjguOC0zMi44LTI3LjJsLTEzLjYsMS4ybC00NC40LDU0TDM1OS4yLDgwLjA3eiIgZmlsbD0iI0ZGRkZGRiIvPgoJCQk8cG9seWdvbiBwb2ludHM9IjIwNCwxNjIuODY5IDE1NC44LDExMy42NyAxMDcuMiwxMTMuNjcgMTU2LjgsMTYyLjg2OSAgICAiIGZpbGw9IiNGRkZGRkYiLz4KCQkJPHBhdGggZD0iTTQ2LDExMy42N3YxNS4yYzAsMTAuOC04LjgsMTkuNi0xOS42LDE5LjZIMTUuNnYxNC40SDEyNGwtNDkuNi00OS4ySDQ2eiIgZmlsbD0iI0ZGRkZGRiIvPgoJCQk8cG9seWdvbiBwb2ludHM9IjI4NCwxNjIuODY5IDIzNC44LDExMy42NyAxODcuNiwxMTMuNjcgMjM2LjgsMTYyLjg2OSAgICAiIGZpbGw9IiNGRkZGRkYiLz4KCQkJPHBvbHlnb24gcG9pbnRzPSIyNjcuNiwxMTMuNjcgMzE3LjIsMTYyLjg2OSAzNjAuOCwxNjIuODY5IDM2MC44LDExMy42NyAgICAiIGZpbGw9IiNGRkZGRkYiLz4KCQkJPHBhdGggZD0iTTM0LDEyOC44Njl2LTMyLjRjMC00LjQtMy42LTcuNi03LjYtNy42SDcuNmMtNC40LDAtNy42LDMuNi03LjYsNy42djMyLjRjMCw0LjQsMy42LDcuNiw3LjYsNy42aDE4LjggICAgIEMzMC44LDEzNi40NywzNCwxMzIuODY5LDM0LDEyOC44Njl6IiBmaWxsPSIjRkZGRkZGIi8+CgkJPC9nPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
                        <h3 class="text-center">Filme</h3>
                    </a>
                </div>
                <div class="col-8"></div>
                <div class="col-2">
                    <div class="row mt-2 d-flex justify-content-end">
                        <a href="wwww.github.com/juanlu19995">
                            <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDQzOC41NDkgNDM4LjU0OSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDM4LjU0OSA0MzguNTQ5OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPHBhdGggZD0iTTQwOS4xMzIsMTE0LjU3M2MtMTkuNjA4LTMzLjU5Ni00Ni4yMDUtNjAuMTk0LTc5Ljc5OC03OS44QzI5NS43MzYsMTUuMTY2LDI1OS4wNTcsNS4zNjUsMjE5LjI3MSw1LjM2NSAgIGMtMzkuNzgxLDAtNzYuNDcyLDkuODA0LTExMC4wNjMsMjkuNDA4Yy0zMy41OTYsMTkuNjA1LTYwLjE5Miw0Ni4yMDQtNzkuOCw3OS44QzkuODAzLDE0OC4xNjgsMCwxODQuODU0LDAsMjI0LjYzICAgYzAsNDcuNzgsMTMuOTQsOTAuNzQ1LDQxLjgyNywxMjguOTA2YzI3Ljg4NCwzOC4xNjQsNjMuOTA2LDY0LjU3MiwxMDguMDYzLDc5LjIyN2M1LjE0LDAuOTU0LDguOTQ1LDAuMjgzLDExLjQxOS0xLjk5NiAgIGMyLjQ3NS0yLjI4MiwzLjcxMS01LjE0LDMuNzExLTguNTYyYzAtMC41NzEtMC4wNDktNS43MDgtMC4xNDQtMTUuNDE3Yy0wLjA5OC05LjcwOS0wLjE0NC0xOC4xNzktMC4xNDQtMjUuNDA2bC02LjU2NywxLjEzNiAgIGMtNC4xODcsMC43NjctOS40NjksMS4wOTItMTUuODQ2LDFjLTYuMzc0LTAuMDg5LTEyLjk5MS0wLjc1Ny0xOS44NDItMS45OTljLTYuODU0LTEuMjMxLTEzLjIyOS00LjA4Ni0xOS4xMy04LjU1OSAgIGMtNS44OTgtNC40NzMtMTAuMDg1LTEwLjMyOC0xMi41Ni0xNy41NTZsLTIuODU1LTYuNTdjLTEuOTAzLTQuMzc0LTQuODk5LTkuMjMzLTguOTkyLTE0LjU1OSAgIGMtNC4wOTMtNS4zMzEtOC4yMzItOC45NDUtMTIuNDE5LTEwLjg0OGwtMS45OTktMS40MzFjLTEuMzMyLTAuOTUxLTIuNTY4LTIuMDk4LTMuNzExLTMuNDI5Yy0xLjE0Mi0xLjMzMS0xLjk5Ny0yLjY2My0yLjU2OC0zLjk5NyAgIGMtMC41NzItMS4zMzUtMC4wOTgtMi40MywxLjQyNy0zLjI4OWMxLjUyNS0wLjg1OSw0LjI4MS0xLjI3Niw4LjI4LTEuMjc2bDUuNzA4LDAuODUzYzMuODA3LDAuNzYzLDguNTE2LDMuMDQyLDE0LjEzMyw2Ljg1MSAgIGM1LjYxNCwzLjgwNiwxMC4yMjksOC43NTQsMTMuODQ2LDE0Ljg0MmM0LjM4LDcuODA2LDkuNjU3LDEzLjc1NCwxNS44NDYsMTcuODQ3YzYuMTg0LDQuMDkzLDEyLjQxOSw2LjEzNiwxOC42OTksNi4xMzYgICBjNi4yOCwwLDExLjcwNC0wLjQ3NiwxNi4yNzQtMS40MjNjNC41NjUtMC45NTIsOC44NDgtMi4zODMsMTIuODQ3LTQuMjg1YzEuNzEzLTEyLjc1OCw2LjM3Ny0yMi41NTksMTMuOTg4LTI5LjQxICAgYy0xMC44NDgtMS4xNC0yMC42MDEtMi44NTctMjkuMjY0LTUuMTRjLTguNjU4LTIuMjg2LTE3LjYwNS01Ljk5Ni0yNi44MzUtMTEuMTRjLTkuMjM1LTUuMTM3LTE2Ljg5Ni0xMS41MTYtMjIuOTg1LTE5LjEyNiAgIGMtNi4wOS03LjYxNC0xMS4wODgtMTcuNjEtMTQuOTg3LTI5Ljk3OWMtMy45MDEtMTIuMzc0LTUuODUyLTI2LjY0OC01Ljg1Mi00Mi44MjZjMC0yMy4wMzUsNy41Mi00Mi42MzcsMjIuNTU3LTU4LjgxNyAgIGMtNy4wNDQtMTcuMzE4LTYuMzc5LTM2LjczMiwxLjk5Ny01OC4yNGM1LjUyLTEuNzE1LDEzLjcwNi0wLjQyOCwyNC41NTQsMy44NTNjMTAuODUsNC4yODMsMTguNzk0LDcuOTUyLDIzLjg0LDEwLjk5NCAgIGM1LjA0NiwzLjA0MSw5LjA4OSw1LjYxOCwxMi4xMzUsNy43MDhjMTcuNzA1LTQuOTQ3LDM1Ljk3Ni03LjQyMSw1NC44MTgtNy40MjFzMzcuMTE3LDIuNDc0LDU0LjgyMyw3LjQyMWwxMC44NDktNi44NDkgICBjNy40MTktNC41NywxNi4xOC04Ljc1OCwyNi4yNjItMTIuNTY1YzEwLjA4OC0zLjgwNSwxNy44MDItNC44NTMsMjMuMTM0LTMuMTM4YzguNTYyLDIxLjUwOSw5LjMyNSw0MC45MjIsMi4yNzksNTguMjQgICBjMTUuMDM2LDE2LjE4LDIyLjU1OSwzNS43ODcsMjIuNTU5LDU4LjgxN2MwLDE2LjE3OC0xLjk1OCwzMC40OTctNS44NTMsNDIuOTY2Yy0zLjksMTIuNDcxLTguOTQxLDIyLjQ1Ny0xNS4xMjUsMjkuOTc5ICAgYy02LjE5MSw3LjUyMS0xMy45MDEsMTMuODUtMjMuMTMxLDE4Ljk4NmMtOS4yMzIsNS4xNC0xOC4xODIsOC44NS0yNi44NCwxMS4xMzZjLTguNjYyLDIuMjg2LTE4LjQxNSw0LjAwNC0yOS4yNjMsNS4xNDYgICBjOS44OTQsOC41NjIsMTQuODQyLDIyLjA3NywxNC44NDIsNDAuNTM5djYwLjIzN2MwLDMuNDIyLDEuMTksNi4yNzksMy41NzIsOC41NjJjMi4zNzksMi4yNzksNi4xMzYsMi45NSwxMS4yNzYsMS45OTUgICBjNDQuMTYzLTE0LjY1Myw4MC4xODUtNDEuMDYyLDEwOC4wNjgtNzkuMjI2YzI3Ljg4LTM4LjE2MSw0MS44MjUtODEuMTI2LDQxLjgyNS0xMjguOTA2ICAgQzQzOC41MzYsMTg0Ljg1MSw0MjguNzI4LDE0OC4xNjgsNDA5LjEzMiwxMTQuNTczeiIgZmlsbD0iI0ZGRkZGRiIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo="/>
                        </a>
                    </div>
                    <div class="row mt-2 d-flex justify-content-end">
                        <a href="wwww.facebook.com/">
                            <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDQzMC4xMTMgNDMwLjExNCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDMwLjExMyA0MzAuMTE0OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPHBhdGggaWQ9IkZhY2Vib29rIiBkPSJNMTU4LjA4MSw4My4zYzAsMTAuODM5LDAsNTkuMjE4LDAsNTkuMjE4aC00My4zODV2NzIuNDEyaDQzLjM4NXYyMTUuMTgzaDg5LjEyMlYyMTQuOTM2aDU5LjgwNSAgIGMwLDAsNS42MDEtMzQuNzIxLDguMzE2LTcyLjY4NWMtNy43ODQsMC02Ny43ODQsMC02Ny43ODQsMHMwLTQyLjEyNywwLTQ5LjUxMWMwLTcuNCw5LjcxNy0xNy4zNTQsMTkuMzIxLTE3LjM1NCAgIGM5LjU4NiwwLDI5LjgxOCwwLDQ4LjU1NywwYzAtOS44NTksMC00My45MjQsMC03NS4zODVjLTI1LjAxNiwwLTUzLjQ3NiwwLTY2LjAyMSwwQzE1NS44NzgtMC4wMDQsMTU4LjA4MSw3Mi40OCwxNTguMDgxLDgzLjN6IiBmaWxsPSIjRkZGRkZGIi8+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg=="/>
                        </a>
                    </div>
                    <div class="row mt-2 d-flex justify-content-end">
                        <a href="wwww.twitter.com/">
                            <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iMjRweCIgaGVpZ2h0PSIyNHB4Ij4KPGc+Cgk8Zz4KCQk8cGF0aCBkPSJNNTEyLDk3LjI0OGMtMTkuMDQsOC4zNTItMzkuMzI4LDEzLjg4OC02MC40OCwxNi41NzZjMjEuNzYtMTIuOTkyLDM4LjM2OC0zMy40MDgsNDYuMTc2LTU4LjAxNiAgICBjLTIwLjI4OCwxMi4wOTYtNDIuNjg4LDIwLjY0LTY2LjU2LDI1LjQwOEM0MTEuODcyLDYwLjcwNCwzODQuNDE2LDQ4LDM1NC40NjQsNDhjLTU4LjExMiwwLTEwNC44OTYsNDcuMTY4LTEwNC44OTYsMTA0Ljk5MiAgICBjMCw4LjMyLDAuNzA0LDE2LjMyLDIuNDMyLDIzLjkzNmMtODcuMjY0LTQuMjU2LTE2NC40OC00Ni4wOC0yMTYuMzUyLTEwOS43OTJjLTkuMDU2LDE1LjcxMi0xNC4zNjgsMzMuNjk2LTE0LjM2OCw1My4wNTYgICAgYzAsMzYuMzUyLDE4LjcyLDY4LjU3Niw0Ni42MjQsODcuMjMyYy0xNi44NjQtMC4zMi0zMy40MDgtNS4yMTYtNDcuNDI0LTEyLjkyOGMwLDAuMzIsMCwwLjczNiwwLDEuMTUyICAgIGMwLDUxLjAwOCwzNi4zODQsOTMuMzc2LDg0LjA5NiwxMDMuMTM2Yy04LjU0NCwyLjMzNi0xNy44NTYsMy40NTYtMjcuNTIsMy40NTZjLTYuNzIsMC0xMy41MDQtMC4zODQtMTkuODcyLTEuNzkyICAgIGMxMy42LDQxLjU2OCw1Mi4xOTIsNzIuMTI4LDk4LjA4LDczLjEyYy0zNS43MTIsMjcuOTM2LTgxLjA1Niw0NC43NjgtMTMwLjE0NCw0NC43NjhjLTguNjA4LDAtMTYuODY0LTAuMzg0LTI1LjEyLTEuNDQgICAgQzQ2LjQ5Niw0NDYuODgsMTAxLjYsNDY0LDE2MS4wMjQsNDY0YzE5My4xNTIsMCwyOTguNzUyLTE2MCwyOTguNzUyLTI5OC42ODhjMC00LjY0LTAuMTYtOS4xMi0wLjM4NC0xMy41NjggICAgQzQ4MC4yMjQsMTM2Ljk2LDQ5Ny43MjgsMTE4LjQ5Niw1MTIsOTcuMjQ4eiIgZmlsbD0iI0ZGRkZGRiIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo="/>
                        </a>
                    </div>
                    <div class="row mt-2 d-flex justify-content-end">
                        <a href="wwww.instagram.com/">
                            <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDYxMiA2MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDYxMiA2MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8ZyBpZD0iaW5zdGFncmFtIj4KCQk8Zz4KCQkJPHBhdGggZD0iTTUxMy4zODEsODQuODY1aC01Ni4xNThjLTE4LjM0NiwwLTMzLjI4MSwxNC45MzYtMzMuMjgxLDMzLjI4MXY1Ni4xNDRjMCwxOC4zNDUsMTQuOTM2LDMzLjI4MSwzMy4yODEsMzMuMjgxaDU2LjE1OCAgICAgYzE4LjM0NSwwLDMzLjI4MS0xNC45MzYsMzMuMjgxLTMzLjI4MXYtNTYuMTQ0QzU0Ni42NjIsOTkuOCw1MzEuNzI2LDg0Ljg2NSw1MTMuMzgxLDg0Ljg2NXogTTUxNy41MTksMTc0LjI5ICAgICBjMCwyLjI4OC0xLjg1MSw0LjEzOC00LjEzOCw0LjEzOGgtNTYuMTU4Yy0yLjI4OCwwLTQuMTM5LTEuODUxLTQuMTM5LTQuMTM4di01Ni4xNDRjMC0yLjI4OCwxLjg2NS00LjEzOCw0LjEzOS00LjEzOGg1Ni4xNTggICAgIGMyLjI3MiwwLDQuMTM4LDEuODUxLDQuMTM4LDQuMTM4VjE3NC4yOXogTTQ4MC44NTcsNy4yODZIMTMxLjE0M0M1OC44MzksNy4yODYsMCw2Ni4xMjUsMCwxMzguNDI5djMzNS4xNDIgICAgIGMwLDcyLjMwNSw1OC44MzksMTMxLjE0MywxMzEuMTQzLDEzMS4xNDNoMzQ5LjcxNEM1NTMuMTYsNjA0LjcxNCw2MTIsNTQ1Ljg3Niw2MTIsNDczLjU3MVYxMzguNDI5ICAgICBDNjEyLDY2LjEyNSw1NTMuMTYsNy4yODYsNDgwLjg1Nyw3LjI4NnogTTU4Mi44NTcsNDczLjU3MWMwLDU2LjI0Ni00NS43NTUsMTAyLTEwMiwxMDJIMTMxLjE0M2MtNTYuMjQ2LDAtMTAyLTQ1Ljc1NC0xMDItMTAyICAgICBWMjU1aDE0Ni44OTVjLTI3LjgwMiwzMC45NzktNDQuODk1LDcxLjc2NC00NC44OTUsMTE2LjU3MWMwLDk2LjQyLDc4LjQzOCwxNzQuODU3LDE3NC44NTcsMTc0Ljg1NyAgICAgczE3NC44NTctNzguNDM4LDE3NC44NTctMTc0Ljg1N2MwLTQ0LjgwNy0xNy4wOTMtODUuNTkyLTQ0Ljg5NS0xMTYuNTcxaDE0Ni44OTVWNDczLjU3MXogTTMwNiwyMjUuODU3ICAgICBjODAuMzQ3LDAsMTQ1LjcxNCw2NS4zNjgsMTQ1LjcxNCwxNDUuNzE0YzAsODAuMzQ4LTY1LjM2NywxNDUuNzE1LTE0NS43MTQsMTQ1LjcxNXMtMTQ1LjcxNC02NS4zNjctMTQ1LjcxNC0xNDUuNzE1ICAgICBDMTYwLjI4NiwyOTEuMjI1LDIyNS42NTMsMjI1Ljg1NywzMDYsMjI1Ljg1N3ogTTU4Mi44NTcsMjI1Ljg1N0g0MDIuNDQ4Yy0yNy42NzEtMTguMzc1LTYwLjgwNy0yOS4xNDMtOTYuNDQ4LTI5LjE0MyAgICAgYy0zNS42MjcsMC02OC43NzcsMTAuNzY4LTk2LjQ0OCwyOS4xNDNIMjkuMTQzdi04Ny40MjhjMC01Ni4yNDYsNDUuNzU0LTEwMiwxMDItMTAyaDM0OS43MTRjNTYuMjQ1LDAsMTAyLDQ1Ljc1NCwxMDIsMTAyICAgICBWMjI1Ljg1N3ogTTMwNiw0NzMuNTcxYzU2LjI0NiwwLDEwMi00NS43NTQsMTAyLTEwMmMwLTU2LjI0NC00NS43NTQtMTAyLTEwMi0xMDJjLTU2LjI0NiwwLTEwMiw0NS43NTUtMTAyLDEwMiAgICAgQzIwNCw0MjcuODE3LDI0OS43NTQsNDczLjU3MSwzMDYsNDczLjU3MXogTTMwNiwyOTguNzE1YzQwLjE3NCwwLDcyLjg1NywzMi42ODUsNzIuODU3LDcyLjg1NiAgICAgYzAsNDAuMTc0LTMyLjY4NCw3Mi44NTctNzIuODU3LDcyLjg1N2MtNDAuMTczLDAtNzIuODU3LTMyLjY4NC03Mi44NTctNzIuODU3QzIzMy4xNDMsMzMxLjM5OSwyNjUuODI3LDI5OC43MTUsMzA2LDI5OC43MTV6IiBmaWxsPSIjRkZGRkZGIi8+CgkJPC9nPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo="/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-center mt-3"> Copyright © All right reserved. </p>

    </nav>
</footer>
</body>
</html>
