@extends('layouts.app')

@section('content')
    <div class="text-center">
        {{ $films->links() }}
    </div>
    @forelse($films as $film)
        <div class="row">
            <div class="col-md-4">
                <img src="{{$film['cover']}}" alt="{{$film['name']}} cover" class="img-fluid img-thumbnail">
                <div class="centered-rating"><h1 class="display-3">{{ $film['rating'] }}</h1></div>
            </div>
            <div class="col-8">
                <div class="row">
                    <div class="row">
                        <h1 class="display-4 col">{{ $film['name'] }}</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="row">Views: {{ $film['views_counted'] }}</div>
                            <div class="row">Reviews: {{ $film['reviews_counted'] }}</div>
                        </div>
                        <div class="col-6">{{ $film['synopsis'] }}</div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <h2 class="display-4">No hay datos a mostrar</h2>
    @endforelse
@endsection
