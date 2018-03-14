@extends('layouts.app')

@push('scripts')
    <script src="{{asset('js/deleteReview.js')}}" defer></script>
@endpush

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

    <div id="modal" class="modal">
        <div class="alert alert-danger"><Strong>Caution!</Strong> If you continue, you won't be able to get it back.</div>
        <div class="row px-3">
            <button class="col-md-6 btn btn-warning" id="cancel" data-izimodal-close="">Cancel</button>
            <button class="col-md-6 btn btn-danger" id="continue">Continue</button>
        </div>
    </div>
@endsection