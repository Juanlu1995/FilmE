@extends('layouts.app')

@section('content')
    <div class="text-center">
        {{ $films->links() }}
    </div>
    @forelse($films as $film)
        <div class="row my-4">
            <div class="col-md-4">
                <a href="/films/show/{{ $film['id'] }}">
                    <img src="{{$film['cover']}}" alt="{{$film['name']}} cover" class="img-fluid img-thumbnail">
                    <div class="centered-rating"><h1 class="display-4">{{ $film['rating'] }}</h1></div>
                </a>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="row">
                        <h1 class="display-4 col">{{ $film['name'] }}</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="row offset-1">Views: {{ $film['views_counted'] }}</div>
                            <div class="row offset-1">Reviews: {{ $film['reviews_counted'] }}</div>
                        </div>
                        <div class="col-md-6 mx-2">{{ $film['synopsis'] }}</div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <h4>No hay datos a mostrar</h4>
    @endforelse
@endsection
