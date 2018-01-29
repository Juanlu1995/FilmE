@extends('layouts.app')


@section('content')

    @include('users.base')

    <div class="row col-auto m-3">
        <div class="col-md-6">
            <div class="row">
                <h2><span class="text-info">Email: </span>
                    <small>{{$user['email']}}</small>
                </h2>
            </div>
            <div class="row">
                <h2><span class="text-info">Phone: </span>
                    <small>{{$user['Phone']}}</small>
                </h2>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <h2><span class="text-info">Created: </span>
                    <small>{{$user['created_at']}}</small>
                </h2>
            </div>
            <div class="row">
                <h2><span class="text-info">Updated: </span>
                    <small>{{$user['updated_at']}}</small>
                </h2>
            </div>
        </div>
    </div>

@endsection