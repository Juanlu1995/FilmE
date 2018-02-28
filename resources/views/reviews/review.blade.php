@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="imagebox border border-dark">
                <a href="/films/show/{{ $review->film->id}}">
                    <img src="{{$review->film->cover}}" alt="{{$review->film->name}} cover" class="img-fluid">
                    <span class="imagebox-desc">{{$review->film->name}}</span>
                </a>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <h2 class="ml-1 display-4 text-primary">{{$review->title}}</h2>
            </div>
            <div class="row mt-5">
                <div class="col-lg-4"><h4 class="text-danger">Rating: {{$review->rating}}</h4></div>
                <div class="col-lg-4"><h4 class="text-danger">Created: {{$review->created_at}}</h4></div>
            </div>
        </div>
        <div class="row mt-5 mx-5">
            <h4>{{$review->content}}<h4>
        </div>
    </div>
@endsection