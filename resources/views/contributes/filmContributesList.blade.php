@extends('layouts.app')

@section('content')

    <div class="row">
        <h1 class="display-4">{{$film->name}}</h1>
    </div>


    <div class="row">
        <h1 class="text-info text-center">Directors</h1>
    </div>
    @include('contributes.partials.list', ['contributes' => $film->directors])

    <div class="row">
        <h1 class="text-info text-center">Actors</h1>
    </div>
    @include('contributes.partials.list', ['contributes' => $film->actors])


@endsection