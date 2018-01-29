@extends("layouts.app")

@section('content')
    <div class="row">
        <div class="col-md-4 my-3">
            <img class="img-fluid" src="{{ $film['cover'] }}"/>
        </div>
        <div class="col-md-8">
            <div class="row my-3">
                <h1>{{$film['name']}}</h1>
            </div>
            <div>
                <h4>Date: {{ $film['date'] }}</h4>
                <h4>Cuntry: {{ $film['country'] }}</h4>
                <h4>Author: {{$film->user->name}}</h4>
                <h4>Duration: {{$film['duration']}}</h4>
                <h2 class="text-danger">Rating: {{$film['rating']}}</h2>

            </div>
        </div>
    </div>
    <div class="text-center mt-3">
        <h2 class="text-success">Synopsis</h2>
    </div>
    <div class="row my-3">
        <div class="col-md">
            <h4>{{$film['synopsis']}}</h4>
        </div>
    </div>
@endsection
