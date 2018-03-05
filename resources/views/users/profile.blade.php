@extends('layouts.app')


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


@endsection