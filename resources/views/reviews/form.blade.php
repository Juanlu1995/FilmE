@extends('layouts.app')

@section('content')

    @php($route = Route::currentRouteName())

    @if($route == 'reviews.create')
        @include('reviews.partials.create')
    @else
        @include('reviews.partials.edit')
    @endif
    {{csrf_field()}}

    <div class="card text-center">
        <div class="card-header card-img-big">
            <img src="{{$film->cover}}" alt="{{$film->name}} cover" class="img-fluid">
        </div>
        <div class="card-body">
            <div class="form-group">
                <h4><label for="title">Title</label></h4>
                <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" id="title"
                       name="title" placeholder="Title" value="{{$route == 'reviews.edit' ? $review->title : ''}}">
                @if ($errors->has('title'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('title') }}</strong>
                    </div>
                @endif
            </div>

            <div class="form-group">
                <h4><label for="content">Content</label></h4>
                <textarea name="content" id="content"
                          class="form-control {{$errors->has('content') ? 'is-invalid' : ''}}" rows="10"> {{$route == 'reviews.edit' ? $review->content : ''}}</textarea>
                @if ($errors->has('content'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('content') }}</strong>
                    </div>
                @endif
            </div>

        </div>
        <div class="card-footer">
            <div class="form-group">
                <h4><label for="rating">Rating</label></h4>
                <input type="number" id="rating" name="rating"
                       class="form-control text-center{{$errors->has('rating') ? 'is-invalid' : ''}}" value="{{$route == 'reviews.edit' ? $review->rating : ''}}">
                @if ($errors->has('rating'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('rating') }}</strong>
                    </div>
                @endif
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