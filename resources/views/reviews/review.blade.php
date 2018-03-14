@extends('layouts.app')
@push('scripts')
    <link rel="stylesheet" href="{{asset('css/iziModal.css')}}">
    <script src="{{asset('js/iziModal.min.js')}}" defer></script>
    <script src="{{asset('js/updateReview.js')}}" defer></script>

@endpush
@section('content')
    @if(session('updated_success'))
        <div class="alert alert-success">
            {{ session('updated_success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-4 text-center">
            <div class="imagebox border border-dark">
                <a href="/films/show/{{ $review->film->id}}">
                    <img src="{{$review->film->cover}}" alt="{{$review->film->name}} cover" class="img-fluid">
                    <span class="imagebox-desc">{{$review->film->name}}</span>
                </a>
            </div>

            {{--TODO que no esté permitido si el usuario no es el creador--}}
            @can('update', $review)

                <button class="btn btn-warning mt-1" id="triggerUpdate">
                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDM3NS4wNTMgMzc1LjA1MyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMzc1LjA1MyAzNzUuMDUzOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+CjxnPgoJPGc+CgkJPGc+CgkJCTxwYXRoIGQ9Ik0xNjkuNiwzNjEuNDUzaC0yNC40Yy0zLjYsMC02LjgsMi44LTYuOCw2LjhjMCwzLjYsMi44LDYuOCw2LjgsNi44aDI0LjRjMy42LDAsNi44LTIuOCw2LjgtNi44ICAgICBDMTc2LjQsMzY0LjY1MywxNzMuNiwzNjEuNDUzLDE2OS42LDM2MS40NTN6IiBmaWxsPSIjMDAwMDAwIi8+CgkJCTxwYXRoIGQ9Ik0zMDcuMiw0MC42NTNjLTMuNi0xMy4yLTEyLTI1LjItMjQuOC0zMi44Yy0wLjQtMC40LTAuOC0wLjgtMS4yLTAuOGMtMTIuOC03LjItMjcuNi04LjgtNDAuOC01LjJzLTI1LjIsMTItMzIuOCwyNC44ICAgICBjLTAuNCwwLjQtMC44LDAuOC0wLjgsMS4ybC0xMjgsMjIyYy0wLjQsMC40LTAuNCwwLjgtMC40LDEuMmwtOCw3NS4ybC00LjQsNDEuMmMwLDAuNCwwLDAuNCwwLDAuOGMwLDMuNiwyLjgsNi44LDYuOCw2LjggICAgIGw1Mi40LTIuNGMzLjYsMCw2LjgtMi44LDYuOC02LjhjMC0zLjYtMi44LTYuOC02LjgtNi44bC0yOS4yLDAuNGwxNi0xMS42bDAuNC0wLjRsNjAuOC00NC40bDAuNC0wLjR2LTAuNGwxMjgtMjIwLjQgICAgIGMwLjQsMCwwLjQtMC40LDAuNC0wLjRDMzA5LjIsNjguNjUzLDMxMC44LDUzLjg1MywzMDcuMiw0MC42NTN6IE0xOTguNCw2OS40NTNsMjkuMiwxNi44TDEyNCwyNjUuNDUzbC0yOS4yLTE2LjhMMTk4LjQsNjkuNDUzeiAgICAgIE04MS42LDM1My40NTNsMi0yMGMwLjQsMCwxLjIsMCwxLjIsMGMyLjQsMC40LDQuNCwxLjIsNi40LDIuNHMzLjYsMi44LDUuMiw0LjRjMC40LDAuNCwwLjgsMC44LDEuMiwxLjJMODEuNiwzNTMuNDUzeiAgICAgIE0xMDguNCwzMzMuMDUzYy0wLjQtMC44LTEuMi0xLjItMS42LTJjLTIuNC0yLjgtNS4yLTUuMi04LjgtNy4yYy0zLjYtMi03LjItMy4yLTEwLjgtNGMtMC44LTAuNC0xLjYtMC40LTIuNC0wLjRsNi01Ni44ICAgICBsNjQsMzYuOEwxMDguNCwzMzMuMDUzeiBNMTY1LjIsMjg5LjQ1M2wtMjkuMi0xNi44bDEwMy42LTE3OS42bDI5LjIsMTYuOEwxNjUuMiwyODkuNDUzeiBNMjc1LjYsOTcuODUzbC03MC00MC40bDEwLjgtMTkuMiAgICAgbDcwLDQwLjhMMjc1LjYsOTcuODUzeiBNMjkyLjgsNjYuNjUzbC02OS4yLTQwYzUuNi02LjQsMTIuOC0xMC44LDIwLjQtMTIuOGMxMC0yLjgsMjAuOC0xLjYsMzAuNCwzLjZjMC40LDAsMC44LDAuNCwxLjIsMC40ICAgICBjOS42LDUuNiwxNS42LDE0LjQsMTguNCwyNC40QzI5Niw1MC4yNTMsMjk1LjYsNTguNjUzLDI5Mi44LDY2LjY1M3oiIGZpbGw9IiMwMDAwMDAiLz4KCQkJPHBhdGggZD0iTTIwNiwzNjEuNDUzaC0xNC44Yy0zLjYsMC02LjgsMi44LTYuOCw2LjhjMCwzLjYsMi44LDYuOCw2LjgsNi44SDIwNmMzLjYsMCw2LjgtMi44LDYuOC02LjggICAgIEMyMTIuOCwzNjQuNjUzLDIxMCwzNjEuNDUzLDIwNiwzNjEuNDUzeiIgZmlsbD0iIzAwMDAwMCIvPgoJCTwvZz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K"/>
                </button>
            @endcan
        </div>
        <div class="col-lg-8">
            <div class="row">
                <h2 class="ml-1 display-4 text-primary" id="titleReview">{{$review->title}}</h2>
            </div>
            <div class="row mt-5">
                <div class="col-lg-4"><h4 id="ratingReview"><span class="text-danger">Rating: </span>{{$review->rating}}
                    </h4></div>
                <div class="col-lg-4"><h4><span
                                class="text-danger">Created: </span>{{$review->created_at->format('Y-m-d')}}</h4></div>
            </div>
        </div>
        <div class="row mt-5 mx-5">
            <h4 id="contentReview">{{$review->content}}</h4>
        </div>
    </div>


    <div id="update" class="modal">
        <div class="car">
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{$review->title}}">
                </div>
                @include('layouts.spinner')
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" class="form-control">{{$review->content}}</textarea>
                </div>
                @include('layouts.spinner')


            </div>
            <input type="hidden" name="review" id="review" value="{{$review->id}}">
            <div class="row px-3">
                <button class="col-md-6 btn btn-warning" id="cancel" data-izimodal-close="">Close</button>
            </div>
        </div>
    </div>

@endsection