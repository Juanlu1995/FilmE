@extends("layouts.app")

@push('scripts')
    <script src="{{asset("js/filmGraph.js")}}" defer></script>
@endpush

@section('content')
    <div class="row">
        <input type="hidden" name="filmId" id="filmId" value="{{$film->id}}">
        <div class="col-lg-4 my-3">
            <img class="img-fluid img-thumbnail" src="{{ $film->cover }}"/>
        </div>
        <div class="col-lg-8">
            <div class="row my-3">
                <h1 class="text-primary">{{$film['name']}}</h1>
            </div>
            <div class="col-lg-4">
                <h4>Date: {{ $film['date'] }}</h4>
                <h4>Cuntry: {{ $film['country'] }}</h4>
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


    @if($film->reviews->count() > 0)
        <div class="row my-3">
            <div class="text-center mt-3 ml-1 row">
                <a href="/reviews/film/{{$film->id}}">
                    <h2 class="border-bottom text-success">Reviews</h2>
                </a>
                @auth()
                    <a href="/reviews/create/{{$film->id}}" class="ml-3 mt-1">
                        <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ0IDQ0IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0NCA0NDsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIyNHB4IiBoZWlnaHQ9IjI0cHgiPgo8cGF0aCBkPSJNMjIsNDRjLTMuMzA5LDAtNi0yLjY2NS02LTUuOTQxVjI4SDUuOTQxQzIuNjY1LDI4LDAsMjUuMzA5LDAsMjJzMi42NjUtNiw1Ljk0MS02SDE2VjUuOTQxQzE2LDIuNjY1LDE4LjY5MSwwLDIyLDAgIHM2LDIuNjY1LDYsNS45NDFWMTZoMTAuMDU5QzQxLjMzNSwxNiw0NCwxOC42OTEsNDQsMjJzLTIuNjY1LDYtNS45NDEsNkgyOHYxMC4wNTlDMjgsNDEuMzM1LDI1LjMwOSw0NCwyMiw0NHogTTUuOTQxLDE4ICBDMy44MDUsMTgsMiwxOS44MzIsMiwyMnMxLjgwNSw0LDMuOTQxLDRIMTh2MTIuMDU5QzE4LDQwLjE5NSwxOS44MzIsNDIsMjIsNDJzNC0xLjgwNSw0LTMuOTQxVjI2aDEyLjA1OUM0MC4xOTUsMjYsNDIsMjQuMTY4LDQyLDIyICBzLTEuODA1LTQtMy45NDEtNEgyNlY1Ljk0MUMyNiwzLjgwNSwyNC4xNjgsMiwyMiwycy00LDEuODA1LTQsMy45NDFWMThINS45NDF6IiBmaWxsPSIjMDAwMDAwIi8+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
                    </a>
                @endauth
            </div>
        </div>

        <div class="row m-3">
            <carousel id="filmReviewsCarousel" :autoplay="true" :navigation-enabled="true" :easing="'ease-out'"
                      :scroll-per-page="true" pagination-color="#3CA4E3" :pagination-padding=6
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
