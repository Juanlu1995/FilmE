@extends('layouts.app')

@section('content')

    <div class="row border-bottom mb-5">
        <table class="mt-4 table table-striped table-bordered">
            <thead class="bg-dark">
            <tr>
                <th scope="col"
                    class="{{Route::currentRouteName() == 'profile.data' ? 'table-light' : ''}} text-center">
                    <a href="/profile/edit/data">Data</a></th>
                <th scope="col"
                    class="{{Route::currentRouteName() == 'profile.password' ? 'table-light' : ''}} text-center">
                    <a href="/profile/edit/password">Password</a></th>
                <th scope="col"
                    class="{{Route::currentRouteName() == 'profile.about' ? 'table-light' : ''}} text-center">
                    <a href="/profile/edit/about">About</a></th>
            </tr>
            </thead>
        </table>

    </div>

    @if(session('updated_success'))
        <div class="alert alert-success">
            <strong>{{session('updated_success')}}</strong>
        </div>
    @endif
    <form action="{{ Request::url() }}" method="post" {{ Route::currentRouteName() == 'profile.about' ? 'enctype="multipart/form-data"' : ''}}>
        {{ csrf_field() }}
        @if(Route::currentRouteName() == 'profile.data')
            @include('users.partials.data')
        @elseif(Route::currentRouteName() == 'profile.password' )
            @include('users.partials.password')
        @elseif(Route::currentRouteName() == 'profile.about' )

            @include('users.partials.about')
        @endif
    </form>
@endsection