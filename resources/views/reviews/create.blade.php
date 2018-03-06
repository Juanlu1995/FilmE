@extends('layouts.app')

@section('content')
    <form action="/reviews" method="POST">
        <div class="card text-center">
            <div class="card-header card-img-big">
                <img src="{{$film->cover}}" alt="{{$film->name}} cover" class="img-fluid">
            </div>
            <div class="card-body">
                <div class="form-group">
                    <h4><label for="title">Title</label></h4>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                </div>
                <div class="form-group">
                    <h4><label for="content">Content</label></h4>
                    <textarea name="content" id="content" class="form-control" rows="10"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <div class="form-group">
                    <h4><label for="rating">Rating</label></h4>
                    <input type="number" id="rating" name="rating" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <button class="btn btn-success col-12 mt-3">
                Publish
            </button>
        </div>
    </form>

@endsection