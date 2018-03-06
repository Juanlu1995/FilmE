@extends('layouts.app')

@section('content')

    <div class="row">
        <h1 class="display-4">{{$film->name}}
            <small class="text-muted">Rating: {{$film->rating}}</small>
        </h1>

    </div>

    @include('reviews.reviewsList')

    <div class="offset-3">
        {{$reviews->links("pagination::bootstrap-4")}}
    </div>
@endsection