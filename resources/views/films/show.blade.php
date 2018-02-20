@extends("layouts.app")

@push('scripts')
    <script src="{{asset("js/filmGraph.js")}}" defer></script>
@endpush

@section('content')
    <div class="row">
        <input type="hidden" name="filmId" id="filmId" value="{{$film->id}}">
        <div class="col-md-4 my-3">
            <img class="img-fluid img-thumbnail" src="{{ $film->cover }}"/>
        </div>
        <div class="col-md-8">
            <div class="row my-3">
                <h1>{{$film['name']}}</h1>
            </div>
            <div class="col-md-4">
                <h4>Date: {{ $film['date'] }}</h4>
                <h4>Cuntry: {{ $film['country'] }}</h4>
                <h4>Author: {{$film->user->name}}</h4>
                <h4>Duration: {{$film['duration']}}</h4>
                <h2 class="text-danger">Rating: {{$film['rating']}}</h2>
            </div>
        </div>
        <div class="text-center mt-3">
            <h2 class="text-success border-bottom">Synopsis</h2>
        </div>
        <div class="row my-3">
            <div class="col-md">
                <h4>{{$film['synopsis']}}</h4>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md">
                <h2 class="border-bottom text-success">Reviews:</h2>
            </div>
        </div>
        <div class="row ml-1">
            <carousel id="filmCarousel" :per-page="3" :autoplay="true" pagination-color="#3CA4E3" :pagination-padding=6
                      class="my-3">
                @foreach($film->reviews as $review)
                    <slide>
                        <div class="imagebox border border-dark">
                            <a href="/reviews/show/{{$review->id}}">
                                <img class="d-block w-100" src="{{$review->user->avatar}}" alt="First slide">
                                <span class="imagebox-desc">{{$review->user->name}}</span>
                            </a>
                        </div>
                    </slide>
                @endforeach
            </carousel>
        </div>
    </div>

    <div class="row my-5">
        <canvas width="400" id="filmGraph" height="110"></canvas>
    </div>

@endsection
