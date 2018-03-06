<div class="row">
    <div class="col-lg-4">
        <img src="{{$user['avatar']}}" alt="avatar" class="img-fluid img-thumbnail">
    </div>
    <div class="col-lg-8">
        <h1 class="offset-lg-2 text-primary">{{$user['name']}} {{$user['last_name']}}
            <small class="text-muted"> {{$user['username']}}</small>
            <div class="offset-md-2 row">
                @isset($user)
                    @if($user->id == Auth::user()->id)
                        <div class="form-group mx-1">
                            <button class="btn btn-warning">
                                <a class="editUser" href="/profile/edit/">
                                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDM3NS4wNTMgMzc1LjA1MyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMzc1LjA1MyAzNzUuMDUzOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+CjxnPgoJPGc+CgkJPGc+CgkJCTxwYXRoIGQ9Ik0xNjkuNiwzNjEuNDUzaC0yNC40Yy0zLjYsMC02LjgsMi44LTYuOCw2LjhjMCwzLjYsMi44LDYuOCw2LjgsNi44aDI0LjRjMy42LDAsNi44LTIuOCw2LjgtNi44ICAgICBDMTc2LjQsMzY0LjY1MywxNzMuNiwzNjEuNDUzLDE2OS42LDM2MS40NTN6IiBmaWxsPSIjMDAwMDAwIi8+CgkJCTxwYXRoIGQ9Ik0zMDcuMiw0MC42NTNjLTMuNi0xMy4yLTEyLTI1LjItMjQuOC0zMi44Yy0wLjQtMC40LTAuOC0wLjgtMS4yLTAuOGMtMTIuOC03LjItMjcuNi04LjgtNDAuOC01LjJzLTI1LjIsMTItMzIuOCwyNC44ICAgICBjLTAuNCwwLjQtMC44LDAuOC0wLjgsMS4ybC0xMjgsMjIyYy0wLjQsMC40LTAuNCwwLjgtMC40LDEuMmwtOCw3NS4ybC00LjQsNDEuMmMwLDAuNCwwLDAuNCwwLDAuOGMwLDMuNiwyLjgsNi44LDYuOCw2LjggICAgIGw1Mi40LTIuNGMzLjYsMCw2LjgtMi44LDYuOC02LjhjMC0zLjYtMi44LTYuOC02LjgtNi44bC0yOS4yLDAuNGwxNi0xMS42bDAuNC0wLjRsNjAuOC00NC40bDAuNC0wLjR2LTAuNGwxMjgtMjIwLjQgICAgIGMwLjQsMCwwLjQtMC40LDAuNC0wLjRDMzA5LjIsNjguNjUzLDMxMC44LDUzLjg1MywzMDcuMiw0MC42NTN6IE0xOTguNCw2OS40NTNsMjkuMiwxNi44TDEyNCwyNjUuNDUzbC0yOS4yLTE2LjhMMTk4LjQsNjkuNDUzeiAgICAgIE04MS42LDM1My40NTNsMi0yMGMwLjQsMCwxLjIsMCwxLjIsMGMyLjQsMC40LDQuNCwxLjIsNi40LDIuNHMzLjYsMi44LDUuMiw0LjRjMC40LDAuNCwwLjgsMC44LDEuMiwxLjJMODEuNiwzNTMuNDUzeiAgICAgIE0xMDguNCwzMzMuMDUzYy0wLjQtMC44LTEuMi0xLjItMS42LTJjLTIuNC0yLjgtNS4yLTUuMi04LjgtNy4yYy0zLjYtMi03LjItMy4yLTEwLjgtNGMtMC44LTAuNC0xLjYtMC40LTIuNC0wLjRsNi01Ni44ICAgICBsNjQsMzYuOEwxMDguNCwzMzMuMDUzeiBNMTY1LjIsMjg5LjQ1M2wtMjkuMi0xNi44bDEwMy42LTE3OS42bDI5LjIsMTYuOEwxNjUuMiwyODkuNDUzeiBNMjc1LjYsOTcuODUzbC03MC00MC40bDEwLjgtMTkuMiAgICAgbDcwLDQwLjhMMjc1LjYsOTcuODUzeiBNMjkyLjgsNjYuNjUzbC02OS4yLTQwYzUuNi02LjQsMTIuOC0xMC44LDIwLjQtMTIuOGMxMC0yLjgsMjAuOC0xLjYsMzAuNCwzLjZjMC40LDAsMC44LDAuNCwxLjIsMC40ICAgICBjOS42LDUuNiwxNS42LDE0LjQsMTguNCwyNC40QzI5Niw1MC4yNTMsMjk1LjYsNTguNjUzLDI5Mi44LDY2LjY1M3oiIGZpbGw9IiMwMDAwMDAiLz4KCQkJPHBhdGggZD0iTTIwNiwzNjEuNDUzaC0xNC44Yy0zLjYsMC02LjgsMi44LTYuOCw2LjhjMCwzLjYsMi44LDYuOCw2LjgsNi44SDIwNmMzLjYsMCw2LjgtMi44LDYuOC02LjggICAgIEMyMTIuOCwzNjQuNjUzLDIxMCwzNjEuNDUzLDIwNiwzNjEuNDUzeiIgZmlsbD0iIzAwMDAwMCIvPgoJCTwvZz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K"/>
                                </a>
                            </button>
                        </div>
                    @endif
                @endisset
                @isset($user)
                    @if($user->id == Auth::user()->id)
                        <form action="/profile" method="POST" class="form-group mx-1" id="deleteForm">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button class="btn btn-danger trigger" id="delete">
                                <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMS4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ4Ni40IDQ4Ni40IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0ODYuNCA0ODYuNDsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIyNHB4IiBoZWlnaHQ9IjI0cHgiPgo8Zz4KCTxnPgoJCTxwYXRoIGQ9Ik00NDYsNzBIMzQ0LjhWNTMuNWMwLTI5LjUtMjQtNTMuNS01My41LTUzLjVoLTk2LjJjLTI5LjUsMC01My41LDI0LTUzLjUsNTMuNVY3MEg0MC40Yy03LjUsMC0xMy41LDYtMTMuNSwxMy41ICAgIFMzMi45LDk3LDQwLjQsOTdoMjQuNHYzMTcuMmMwLDM5LjgsMzIuNCw3Mi4yLDcyLjIsNzIuMmgyMTIuNGMzOS44LDAsNzIuMi0zMi40LDcyLjItNzIuMlY5N0g0NDZjNy41LDAsMTMuNS02LDEzLjUtMTMuNSAgICBTNDUzLjUsNzAsNDQ2LDcweiBNMTY4LjYsNTMuNWMwLTE0LjYsMTEuOS0yNi41LDI2LjUtMjYuNWg5Ni4yYzE0LjYsMCwyNi41LDExLjksMjYuNSwyNi41VjcwSDE2OC42VjUzLjV6IE0zOTQuNiw0MTQuMiAgICBjMCwyNC45LTIwLjMsNDUuMi00NS4yLDQ1LjJIMTM3Yy0yNC45LDAtNDUuMi0yMC4zLTQ1LjItNDUuMlY5N2gzMDIuOXYzMTcuMkgzOTQuNnoiIGZpbGw9IiMwMDAwMDAiLz4KCQk8cGF0aCBkPSJNMjQzLjIsNDExYzcuNSwwLDEzLjUtNiwxMy41LTEzLjVWMTU4LjljMC03LjUtNi0xMy41LTEzLjUtMTMuNXMtMTMuNSw2LTEzLjUsMTMuNXYyMzguNSAgICBDMjI5LjcsNDA0LjksMjM1LjcsNDExLDI0My4yLDQxMXoiIGZpbGw9IiMwMDAwMDAiLz4KCQk8cGF0aCBkPSJNMTU1LjEsMzk2LjFjNy41LDAsMTMuNS02LDEzLjUtMTMuNVYxNzMuN2MwLTcuNS02LTEzLjUtMTMuNS0xMy41cy0xMy41LDYtMTMuNSwxMy41djIwOC45ICAgIEMxNDEuNiwzOTAuMSwxNDcuNywzOTYuMSwxNTUuMSwzOTYuMXoiIGZpbGw9IiMwMDAwMDAiLz4KCQk8cGF0aCBkPSJNMzMxLjMsMzk2LjFjNy41LDAsMTMuNS02LDEzLjUtMTMuNVYxNzMuN2MwLTcuNS02LTEzLjUtMTMuNS0xMy41cy0xMy41LDYtMTMuNSwxMy41djIwOC45ICAgIEMzMTcuOCwzOTAuMSwzMjMuOCwzOTYuMSwzMzEuMywzOTYuMXoiIGZpbGw9IiMwMDAwMDAiLz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K"/>
                            </button>
                        </form>
                    @endif
                @endisset
            </div>
        </h1>
        <div class="m-3">
            <div class="row">
                <h5>
                    <span class="text-primary">
                        Website:
                    </span>
                    <small>
                        {{$user['website']}}
                    </small>
                </h5>
            </div>

            <div class="row">

                <h5>
                    <span class="text-primary">
                        About:
                    </span>
                    <small>
                        {{$user['about']}}
                    </small>
                </h5>
            </div>

            <div class="row border-bottom">
                <a href="/reviews/show/user/{{$user->username}}">
                    <h3 class="text-primary">Reviews:</h3>
                </a>
            </div>
            <carousel :per-page="3" :autoplay="true" :navigation-enabled="true" :easing="'ease-out'"
                      :scroll-per-page="true" pagination-color="#3CA4E3" :pagination-padding=6 class="my-3"
                      id="userCarousel">
                @foreach($user->reviews as $review)
                    <slide>
                        <div class="imagebox border border-dark">
                            <a href="/reviews/show/{{$review->id}}">
                                <img class="d-block w-100 imageCarousel" src="{{$review->film->cover}}"
                                     alt="First slide">
                                <span class="imagebox-desc">{{$review->film->name}}</span>
                            </a>
                        </div>
                    </slide>
                @endforeach
            </carousel>

        </div>
    </div>
</div>
