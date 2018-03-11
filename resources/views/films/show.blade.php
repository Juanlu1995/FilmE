@extends("layouts.app")

@push('scripts')
    <script src="{{asset("js/filmGraph.js")}}" defer></script>
@endpush

@section('content')
    <div class="row">
        <input type="hidden" name="filmId" id="filmId" value="{{$film->id}}">
        <div class="col-lg-4 my-3">
            <img class="img-fluid img-thumbnail" src="{{ $film->cover }}"/>
            @auth()
                <form action="/users-see/{{$film->id}}" method="POST">
                    {{csrf_field()}}
                    @if(! Auth::user()->seeFilm($film))
                        <button type="submit" class="btn btn-outline-info form-control rounded"><strong class="mr-3">No
                                vista</strong><img
                                    src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDU5LjIgNTkuMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTkuMiA1OS4yOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjMycHgiIGhlaWdodD0iMzJweCI+CjxnPgoJPHBhdGggZD0iTTUxLjA2MiwyMS41NjFjLTUuNzU5LTUuNzU5LTEzLjQxNi04LjkzMS0yMS41NjEtOC45MzFTMTMuNywxNS44MDEsNy45NDEsMjEuNTYxTDAsMjkuNTAxbDguMTM4LDguMTM4ICAgYzUuNzU5LDUuNzU5LDEzLjQxNiw4LjkzMSwyMS41NjEsOC45MzFzMTUuODAyLTMuMTcxLDIxLjU2MS04LjkzMWw3Ljk0MS03Ljk0MUw1MS4wNjIsMjEuNTYxeiBNNDkuODQ1LDM2LjIyNSAgIGMtNS4zODEsNS4zODEtMTIuNTM2LDguMzQ1LTIwLjE0Niw4LjM0NXMtMTQuNzY1LTIuOTYzLTIwLjE0Ni04LjM0NWwtNi43MjQtNi43MjRsNi41MjctNi41MjcgICBjNS4zODEtNS4zODEsMTIuNTM2LTguMzQ1LDIwLjE0Ni04LjM0NXMxNC43NjUsMi45NjMsMjAuMTQ2LDguMzQ1bDYuNzI0LDYuNzI0TDQ5Ljg0NSwzNi4yMjV6IiBmaWxsPSIjMDAwMDAwIi8+Cgk8cGF0aCBkPSJNMjkuNTcyLDE2LjU3Yy03LjE2OCwwLTEzLDUuODMyLTEzLDEzczUuODMyLDEzLDEzLDEzczEzLTUuODMyLDEzLTEzUzM2Ljc0MSwxNi41NywyOS41NzIsMTYuNTd6IE0yOS41NzIsMjQuNTcgICBjLTIuNzU3LDAtNSwyLjI0My01LDVjMCwwLjU1Mi0wLjQ0OCwxLTEsMXMtMS0wLjQ0OC0xLTFjMC0zLjg2LDMuMTQtNyw3LTdjMC41NTIsMCwxLDAuNDQ4LDEsMVMzMC4xMjUsMjQuNTcsMjkuNTcyLDI0LjU3eiIgZmlsbD0iIzAwMDAwMCIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo="/>
                            @else
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-outline-warning form-control rounded"><strong
                                            class="mr-3">Vista</strong><img
                                            src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDU5LjIgNTkuMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTkuMiA1OS4yOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjMycHgiIGhlaWdodD0iMzJweCI+CjxnPgoJPHBhdGggZD0iTTUxLjA2MiwyMS44NDFjLTIuMS0yLjEtNC40NTQtMy44NTEtNi45OS01LjIzNWw5LjU0OS05LjU0OWMwLjM5MS0wLjM5MSwwLjM5MS0xLjAyMywwLTEuNDE0cy0xLjAyMy0wLjM5MS0xLjQxNCwwICAgTDQyLjE4NiwxNS42NjNjLTMuOTMtMS44LTguMjMzLTIuNzUzLTEyLjY4NS0yLjc1M2MtOC4xNDUsMC0xNS44MDIsMy4xNzEtMjEuNTYxLDguOTMxTDAsMjkuNzgxbDguMTM4LDguMTM4ICAgYzIuMDIzLDIuMDIzLDQuMjg0LDMuNzE5LDYuNzE0LDUuMDc4bC05LjE0NSw5LjE0NWMtMC4zOTEsMC4zOTEtMC4zOTEsMS4wMjMsMCwxLjQxNGMwLjE5NSwwLjE5NSwwLjQ1MSwwLjI5MywwLjcwNywwLjI5MyAgIHMwLjUxMi0wLjA5OCwwLjcwNy0wLjI5M2w5LjU5My05LjU5M2M0LjAxLDEuODg5LDguNDIsMi44ODYsMTIuOTg0LDIuODg2YzguMTQ1LDAsMTUuODAyLTMuMTcxLDIxLjU2MS04LjkzMWw3Ljk0MS03Ljk0MSAgIEw1MS4wNjIsMjEuODQxeiBNMTYuMzIxLDQxLjUyOWMtMi40NjEtMS4zMTItNC43NDEtMi45OTYtNi43NjktNS4wMjRsLTYuNzI0LTYuNzI0bDYuNTI3LTYuNTI3ICAgYzUuMzgxLTUuMzgxLDEyLjUzNi04LjM0NSwyMC4xNDYtOC4zNDVjMy45MDMsMCw3LjY4MywwLjc4NCwxMS4xNjksMi4yN0wxNi4zMjEsNDEuNTI5eiBNNDkuODQ1LDM2LjUwNSAgIGMtNS4zODEsNS4zODEtMTIuNTM2LDguMzQ1LTIwLjE0Niw4LjM0NWMtNC4wMTUsMC03LjktMC44MzMtMTEuNDY4LTIuNDAybDI0LjM2MS0yNC4zNjFjMi41NywxLjMzMyw0Ljk1MSwzLjA2Miw3LjA1Niw1LjE2OCAgIGw2LjcyNCw2LjcyNEw0OS44NDUsMzYuNTA1eiIgZmlsbD0iIzAwMDAwMCIvPgoJPHBhdGggZD0iTTI5LjU3MiwxNi44NWMtNy4xNjgsMC0xMyw1LjgzMi0xMywxM2MwLDIuNTQzLDAuNzQ1LDQuOTEsMi4wMTIsNi45MTZsMTcuOTA0LTE3LjkwNCAgIEMzNC40ODIsMTcuNTk1LDMyLjExNSwxNi44NSwyOS41NzIsMTYuODV6IiBmaWxsPSIjMDAwMDAwIi8+Cgk8cGF0aCBkPSJNMjIuNDU5LDQwLjcxOGMyLjA0NiwxLjM0Myw0LjQ4OCwyLjEzMSw3LjExMywyLjEzMWM3LjE2OCwwLDEzLTUuODMyLDEzLTEzYzAtMi42MjUtMC43ODgtNS4wNjctMi4xMzEtNy4xMTMgICBMMjIuNDU5LDQwLjcxOHoiIGZpbGw9IiMwMDAwMDAiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K"/>
                                </button>
                    @endif
                </form>
            @endauth
        </div>
        <div class="col-lg-8">
            <div class="my-3">
                <div class="row">
                    <h1 class="text-primary">{{$film->name}}</h1>
                </div>
                <div class="row">
                    @auth()
                        @if(Auth::user()->can('update', $film))
                            <a href="/films/edit/{{$film->id}}">
                                <button class="btn btn-warning">
                                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDM3NS4wNTMgMzc1LjA1MyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMzc1LjA1MyAzNzUuMDUzOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+CjxnPgoJPGc+CgkJPGc+CgkJCTxwYXRoIGQ9Ik0xNjkuNiwzNjEuNDUzaC0yNC40Yy0zLjYsMC02LjgsMi44LTYuOCw2LjhjMCwzLjYsMi44LDYuOCw2LjgsNi44aDI0LjRjMy42LDAsNi44LTIuOCw2LjgtNi44ICAgICBDMTc2LjQsMzY0LjY1MywxNzMuNiwzNjEuNDUzLDE2OS42LDM2MS40NTN6IiBmaWxsPSIjMDAwMDAwIi8+CgkJCTxwYXRoIGQ9Ik0zMDcuMiw0MC42NTNjLTMuNi0xMy4yLTEyLTI1LjItMjQuOC0zMi44Yy0wLjQtMC40LTAuOC0wLjgtMS4yLTAuOGMtMTIuOC03LjItMjcuNi04LjgtNDAuOC01LjJzLTI1LjIsMTItMzIuOCwyNC44ICAgICBjLTAuNCwwLjQtMC44LDAuOC0wLjgsMS4ybC0xMjgsMjIyYy0wLjQsMC40LTAuNCwwLjgtMC40LDEuMmwtOCw3NS4ybC00LjQsNDEuMmMwLDAuNCwwLDAuNCwwLDAuOGMwLDMuNiwyLjgsNi44LDYuOCw2LjggICAgIGw1Mi40LTIuNGMzLjYsMCw2LjgtMi44LDYuOC02LjhjMC0zLjYtMi44LTYuOC02LjgtNi44bC0yOS4yLDAuNGwxNi0xMS42bDAuNC0wLjRsNjAuOC00NC40bDAuNC0wLjR2LTAuNGwxMjgtMjIwLjQgICAgIGMwLjQsMCwwLjQtMC40LDAuNC0wLjRDMzA5LjIsNjguNjUzLDMxMC44LDUzLjg1MywzMDcuMiw0MC42NTN6IE0xOTguNCw2OS40NTNsMjkuMiwxNi44TDEyNCwyNjUuNDUzbC0yOS4yLTE2LjhMMTk4LjQsNjkuNDUzeiAgICAgIE04MS42LDM1My40NTNsMi0yMGMwLjQsMCwxLjIsMCwxLjIsMGMyLjQsMC40LDQuNCwxLjIsNi40LDIuNHMzLjYsMi44LDUuMiw0LjRjMC40LDAuNCwwLjgsMC44LDEuMiwxLjJMODEuNiwzNTMuNDUzeiAgICAgIE0xMDguNCwzMzMuMDUzYy0wLjQtMC44LTEuMi0xLjItMS42LTJjLTIuNC0yLjgtNS4yLTUuMi04LjgtNy4yYy0zLjYtMi03LjItMy4yLTEwLjgtNGMtMC44LTAuNC0xLjYtMC40LTIuNC0wLjRsNi01Ni44ICAgICBsNjQsMzYuOEwxMDguNCwzMzMuMDUzeiBNMTY1LjIsMjg5LjQ1M2wtMjkuMi0xNi44bDEwMy42LTE3OS42bDI5LjIsMTYuOEwxNjUuMiwyODkuNDUzeiBNMjc1LjYsOTcuODUzbC03MC00MC40bDEwLjgtMTkuMiAgICAgbDcwLDQwLjhMMjc1LjYsOTcuODUzeiBNMjkyLjgsNjYuNjUzbC02OS4yLTQwYzUuNi02LjQsMTIuOC0xMC44LDIwLjQtMTIuOGMxMC0yLjgsMjAuOC0xLjYsMzAuNCwzLjZjMC40LDAsMC44LDAuNCwxLjIsMC40ICAgICBjOS42LDUuNiwxNS42LDE0LjQsMTguNCwyNC40QzI5Niw1MC4yNTMsMjk1LjYsNTguNjUzLDI5Mi44LDY2LjY1M3oiIGZpbGw9IiMwMDAwMDAiLz4KCQkJPHBhdGggZD0iTTIwNiwzNjEuNDUzaC0xNC44Yy0zLjYsMC02LjgsMi44LTYuOCw2LjhjMCwzLjYsMi44LDYuOCw2LjgsNi44SDIwNmMzLjYsMCw2LjgtMi44LDYuOC02LjggICAgIEMyMTIuOCwzNjQuNjUzLDIxMCwzNjEuNDUzLDIwNiwzNjEuNDUzeiIgZmlsbD0iIzAwMDAwMCIvPgoJCTwvZz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K"/>
                                </button>
                            </a>
                        @endif
                        @if(Auth::user()->can('delete', $film))
                            <form action="/films/{{$film->id}}" method="POST" class="form-group mx-1" id="deleteForm">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger trigger" id="delete">
                                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMS4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ4Ni40IDQ4Ni40IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0ODYuNCA0ODYuNDsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIyNHB4IiBoZWlnaHQ9IjI0cHgiPgo8Zz4KCTxnPgoJCTxwYXRoIGQ9Ik00NDYsNzBIMzQ0LjhWNTMuNWMwLTI5LjUtMjQtNTMuNS01My41LTUzLjVoLTk2LjJjLTI5LjUsMC01My41LDI0LTUzLjUsNTMuNVY3MEg0MC40Yy03LjUsMC0xMy41LDYtMTMuNSwxMy41ICAgIFMzMi45LDk3LDQwLjQsOTdoMjQuNHYzMTcuMmMwLDM5LjgsMzIuNCw3Mi4yLDcyLjIsNzIuMmgyMTIuNGMzOS44LDAsNzIuMi0zMi40LDcyLjItNzIuMlY5N0g0NDZjNy41LDAsMTMuNS02LDEzLjUtMTMuNSAgICBTNDUzLjUsNzAsNDQ2LDcweiBNMTY4LjYsNTMuNWMwLTE0LjYsMTEuOS0yNi41LDI2LjUtMjYuNWg5Ni4yYzE0LjYsMCwyNi41LDExLjksMjYuNSwyNi41VjcwSDE2OC42VjUzLjV6IE0zOTQuNiw0MTQuMiAgICBjMCwyNC45LTIwLjMsNDUuMi00NS4yLDQ1LjJIMTM3Yy0yNC45LDAtNDUuMi0yMC4zLTQ1LjItNDUuMlY5N2gzMDIuOXYzMTcuMkgzOTQuNnoiIGZpbGw9IiMwMDAwMDAiLz4KCQk8cGF0aCBkPSJNMjQzLjIsNDExYzcuNSwwLDEzLjUtNiwxMy41LTEzLjVWMTU4LjljMC03LjUtNi0xMy41LTEzLjUtMTMuNXMtMTMuNSw2LTEzLjUsMTMuNXYyMzguNSAgICBDMjI5LjcsNDA0LjksMjM1LjcsNDExLDI0My4yLDQxMXoiIGZpbGw9IiMwMDAwMDAiLz4KCQk8cGF0aCBkPSJNMTU1LjEsMzk2LjFjNy41LDAsMTMuNS02LDEzLjUtMTMuNVYxNzMuN2MwLTcuNS02LTEzLjUtMTMuNS0xMy41cy0xMy41LDYtMTMuNSwxMy41djIwOC45ICAgIEMxNDEuNiwzOTAuMSwxNDcuNywzOTYuMSwxNTUuMSwzOTYuMXoiIGZpbGw9IiMwMDAwMDAiLz4KCQk8cGF0aCBkPSJNMzMxLjMsMzk2LjFjNy41LDAsMTMuNS02LDEzLjUtMTMuNVYxNzMuN2MwLTcuNS02LTEzLjUtMTMuNS0xMy41cy0xMy41LDYtMTMuNSwxMy41djIwOC45ICAgIEMzMTcuOCwzOTAuMSwzMjMuOCwzOTYuMSwzMzEuMywzOTYuMXoiIGZpbGw9IiMwMDAwMDAiLz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K"/>
                                </button>
                            </form>

                        @endif
                    @endauth
                </div>
            </div>
            <div class="col-lg-6">
                <h4>Date: {{ $film['date'] }}</h4>
                <h4>Nationality: {{ $film->nationality->name}}</h4>
                <h4>Author: <a href="/users/show/{{$film->user->username}}">{{$film->user->name}}</a></h4>
                <h4>Duration: {{$film['duration']}}</h4>
                <h2 class="text-danger">Rating: {{$film['rating']}}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="text-center mt-3">
            <h2 class="text-success border-bottom">Synopsis</h2>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-lg">
            <h4>{{$film['synopsis']}}</h4>
        </div>
    </div>



    @if($film->actors->count() > 0)
        <div class="row my-3">
            <div class="text-center mt-3 ml-1 row">
                <a href="/contributes/film/show/{{$film->id}}">
                    {{--todo enlace a los contributes de una película--}}
                    <h2 class="border-bottom text-success">Actors</h2>
                </a>
            </div>
        </div>

        <div class="row m-3">
            <carousel id="filmContributesCarousel" :autoplay="true" :navigation-enabled="true" :easing="'ease-out'"
                      :scroll-per-page="true" pagination-color="#3CA4E3" :pagination-padding=6 :per-page="3"
                      class="my-3">
                @foreach($film->actors as $actor)
                    <slide>
                        <div class="imagebox border border-dark">
                            <a href="/contributes/show/{{$actor->slug}}">
                                <img class="d-block" src="{{$actor->photo}}" alt="First slide">
                                <span class="imagebox-desc">{{$actor->name}}</span>
                            </a>
                        </div>
                    </slide>
                @endforeach
            </carousel>
        </div>
    @endif
    @if($film->directors->count() > 0)
        <div class="row my-3">
            <div class="text-center mt-3 ml-1 row">
                <a href="/contributes/film/show/{{$film->id}}">
                    {{--todo enlace a los contributes de una película--}}
                    <h2 class="border-bottom text-success">Directors</h2>
                </a>
            </div>
        </div>

        <div class="row m-3">
            <carousel id="filmContributesCarousel" :autoplay="true" :navigation-enabled="true" :easing="'ease-out'"
                      :scroll-per-page="true" pagination-color="#3CA4E3" :pagination-padding=6 :per-page="3"
                      class="my-3">
                @foreach($film->directors as $director)
                    <slide>
                        <div class="imagebox border border-dark">
                            <a href="/contributes/show/{{$director->slug}}">
                                <img class="d-block" src="{{$director->photo}}" alt="First slide">
                                <span class="imagebox-desc">{{$director->name}}</span>
                            </a>
                        </div>
                    </slide>
                @endforeach
            </carousel>
        </div>
    @endif



    @if($film->reviews->count() > 0)
        <div class="row my-3">
            <div class="text-center mt-3 ml-1 row">
                <a href="/reviews/film/{{$film->id}}">
                    <h2 class="border-bottom text-success">Reviews</h2>
                </a>
                @auth()
                    <a href="/reviews/create/{{$film->id}}" class="ml-3 mt-1">
                        <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ0IDQ0IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0NCA0NDsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIyNHB4IiBoZWlnaHQ9IjI0cHgiPgo8cGF0aCBkPSJNMjIsNDRjLTMuMzA5LDAtNi0yLjY2NS02LTUuOTQxVjI4SDUuOTQxQzIuNjY1LDI4LDAsMjUuMzA5LDAsMjJzMi42NjUtNiw1Ljk0MS02SDE2VjUuOTQxQzE2LDIuNjY1LDE4LjY5MSwwLDIyLDAgIHM2LDIuNjY1LDYsNS45NDFWMTZoMTAuMDU5QzQxLjMzNSwxNiw0NCwxOC42OTEsNDQsMjJzLTIuNjY1LDYtNS45NDEsNkgyOHYxMC4wNTlDMjgsNDEuMzM1LDI1LjMwOSw0NCwyMiw0NHogTTUuOTQxLDE4ICBDMy44MDUsMTgsMiwxOS44MzIsMiwyMnMxLjgwNSw0LDMuOTQxLDRIMTh2MTIuMDU5QzE4LDQwLjE5NSwxOS44MzIsNDIsMjIsNDJzNC0xLjgwNSw0LTMuOTQxVjI2aDEyLjA1OUM0MC4xOTUsMjYsNDIsMjQuMTY4LDQyLDIyICBzLTEuODA1LTQtMy45NDEtNEgyNlY1Ljk0MUMyNiwzLjgwNSwyNC4xNjgsMiwyMiwycy00LDEuODA1LTQsMy45NDFWMThINS45NDF6IiBmaWxsPSIjMDAwMDAwIi8+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo="/>
                    </a>
                @endauth
            </div>
        </div>

        <div class="row m-3">
            <carousel id="filmReviewsCarousel" :autoplay="true" :navigation-enabled="true" :easing="'ease-out'"
                      :scroll-per-page="true" pagination-color="#3CA4E3" :pagination-padding=6 :per-page="3"
                      class="my-3">
                @foreach($film->reviews as $review)
                    <slide>
                        <div class="imagebox border border-dark">
                            <a href="/reviews/{{$review->id}}">
                                <img class="d-block" src="{{$review->user->avatar}}" alt="First slide">
                                <span class="imagebox-desc">{{$review->user->name}}</span>
                            </a>
                        </div>
                    </slide>
                @endforeach
            </carousel>
        </div>
    @endif

    <div class="row my-5">
        <canvas width="400" id="filmGraph" height="110"></canvas>
    </div>

@endsection
