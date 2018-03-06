@extends('layouts.app')

@section('content')
    <div class="row">
        <h1 class="display-4">{{$user->name}} {{$user->last_name}}
            <small class="text-muted">{{$user->username}}</small>
        </h1>
    </div>
    <div class="content">
        @include('reviews.reviewsList')
    </div>
    <div class="offset-5">
        {{$reviews->links("pagination::bootstrap-4")}}
    </div>
@endsection