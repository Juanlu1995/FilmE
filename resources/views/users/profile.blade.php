@extends('layouts.app')

@push('scripts')
    <link rel="stylesheet" href="{{asset('css/iziModal.css')}}">
    <script src="{{asset('js/iziModal.min.js')}}" defer></script>
    <script src="{{asset('js/modals.js')}}" defer></script>

@endpush

@section('content')

    @include('users.partials.base')

    <div class="row col-auto m-3">
        <div class="row col-md-8">
            <div class="col-md-6">
                <h2><span class="text-info">Email: </span>
                    <small class="row mx-1">{{$user->email}}</small>
                </h2>
            </div>
            <div class="col-md-6">
                <h2><span class="text-info">Phone: </span>
                    <small class="row mx-1">{{$user->phone}}</small>
                </h2>
            </div>
        </div>
        <div class="row col-md-4">
            <div class="col-md-6">
                <h4><span class="text-info">Created: </span>
                    <small class="row mx-1">{{$user->created_at->format('Y-m-d')}}</small>
                </h4>
            </div>
            <div class="col-md-6">
                <h4><span class="text-info">Updated: </span>
                    <small class="row mx-1">{{$user->updated_at->format('Y-m-d')}}</small>
                </h4>
            </div>
        </div>
    </div>



    <div id="modal" class="modal">
        <div class="alert alert-danger"><Strong>Caution!</Strong> If you continue, you won't be able to get it back.</div>
        <div class="row px-3">
            <button class="col-md-6 btn btn-warning" id="cancel" data-izimodal-close="">Cancel</button>
            <button class="col-md-6 btn btn-danger" id="continue">Continue</button>
        </div>
    </div>
@endsection